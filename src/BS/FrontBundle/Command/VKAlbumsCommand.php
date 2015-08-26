<?php
namespace BS\FrontBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use BS\AdminBundle\Entity\Action;
use BS\AdminBundle\Entity\Event;
use BS\AdminBundle\Entity\Blog;
use BS\AdminBundle\Entity\ActionGallery;
use BS\AdminBundle\Entity\EventGallery;
use BS\AdminBundle\Entity\BlogGallery;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class VKAlbumsCommand extends ContainerAwareCommand
{
    private $vk;  
    private $fs;

    protected function configure()
    {
        $this
            ->setName('vk:albums')
            ->setDescription('Get photos form albums vk')
            ->addArgument(
                'entity',
                InputArgument::REQUIRED,
                'target entity'
            )      
            ->addArgument(
                'albumId',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'album id (optional)'
            ) 

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ids = '';
        if ($idsArr = $input->getArgument('albumId')) {
            $ids .= ' '.implode(', ', $idsArr);
        }
        $entityName =  $input->getArgument('entity');
        $entity = $this->validateEntity($entityName);
        if($entity != false){
            $this->init();
            $output->writeln('Start get albums...');
            $albums = $this->getAlbums($ids);
            $output->writeln('Start get photos...');
            $albums = $this->getPhotos($albums);
            $output->writeln('Start get start save...');
            $this->save($albums, $entityName ,$output);
            $output->writeln('Finish!');
            // $output->writeln(print_r($albums));  
        } else {
            $output->writeln('Target entity is not valid');
        }
    }

    private function init()
    {
        $this->vk = $this->getContainer()->get('bsvk');
        $this->vk->setApiVersion('5.35');
        $this->vk->init('4319049', 'IbFXpul9VUtZdbIm9dvW');
        $this->fs = new Filesystem();
    }

    private function getAlbums($ids = '')
    {
        $albums = $this->vk->api('photos.getAlbums', array(
                'owner_id' => '-17550017',
                'album_ids' => $ids
            ));
        if($albums['response']['count'] == 0){
            $output->writeln('Album not found');
            exit();
        }
        
        return $albums['response']['items'];
    }

    private function getPhotos($albums)
    {   
        $answer = array();
        foreach ($albums as $key => $album) {
            $answer[$key] = $album;
            $photos = $this->vk->api('photos.get', array(
                    'owner_id' => '-17550017',
                    'album_id' => $album['id'],
                    'photo_sizes' => 0
                ));
            $answer[$key]['photos'] = $photos['response']['items'];
        }

        return $answer;
    }

    private function save($albums = array(), $entityName, $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        // die(print_r($albums));
        // $em->getRepository('BSAdminBundle:'.$entity);
        foreach ($albums as $album) {
            $entity = $this->getObjectEntity($entityName);
            $entity->setCaption($album['title']);
            $entity->setSmallContent($album['description']);
            $entity->setContent($album['description']);
            $entity->setPublished(true);
            foreach ($album['photos'] as $photo) {
                $gallery = $this->getObjectEntityGallery($entityName);
                $photoHref = $this->getMaxSizePhoto($photo);
                $ext = pathinfo($photoHref, PATHINFO_EXTENSION);
                $fileName = pathinfo($photoHref, PATHINFO_FILENAME)  . '.' . $ext;
                $filePath = $this->getContainer()->getParameter('upload_dirs.'.$entityName.'_photo.upload_destination') . '/' . $fileName;
                // $filePathForSave = $this->getContainer()->getParameter('upload_dirs.'.$entityName.'_photo.uri_prefix') . '/' . $fileName;
                $this->fs->copy($photoHref, $filePath);
                $output->writeln('Saved file '. $filePath);
                $gallery->setCaption($entity->getCaption() . '. ' . $photo['text']);
                $gallery->setDescription($entity->getCaption() . '. ' . $photo['text']);
                $gallery->setPhoto($fileName);
                $entity->addGallery($gallery);
                $output->writeln('Added new item gallery');
            }
            $output->writeln('Persist entity');
            $em->persist($entity);
            
        }

        $output->writeln('Write to db');
        $em->flush();
        

    }

    private function validateEntity($entity)
    {
        switch ($entity) {
            case 'action':
                $answer = true;
                break;
            case 'event':
                $answer = true;
                break;
            case 'blog':
                $answer = true;
                break;
            default:
                $answer = false;
                break;
        }

        return $entity;
    }

    private function getObjectEntity($entityName)
    {
        switch ($entityName) {
            case 'action':
                $entity = new Action();
                break;
            case 'event':
                $entity = new Event();
                break;
            case 'blog':
                $entity = new Blog();
                break;
            default:
                $entity = false;
                break;
        }

        return $entity;
    }

    private function getObjectEntityGallery($entityName)
    {
        switch ($entityName) {
            case 'action':
                $entity = new ActionGallery();
                break;
            case 'event':
                $entity = new EventGallery();
                break;
            case 'blog':
                $entity = new BlogGallery();
                break;
            default:
                $entity = false;
                break;
        }

        return $entity;
    }

    private function getMaxSizePhoto($photo)
    {
        // Массив сотирован, следовательно самое последнее значение - самое большое 
        $lastKey = '';
        foreach ($photo as $key => $val) {
            if(substr($key, 0, 6) == 'photo_'){
                $lastKey = $key;
            }
        }

        return $photo[$lastKey];

    }

}