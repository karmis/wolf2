<?php
namespace BS\FrontBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class VKAlbumsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('vk:albums')
            ->setDescription('Get photos form albums vk')
            ->addArgument(
                'albumId',
                InputArgument::OPTIONAL,
                'album id (optional)'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('albumId');
        $albums = $this->getAlbums($id);
        

        $output->writeln(print_r($albums));
    }

    private function getAlbums($id = null)
    {
        $vk = $logger = $this->getContainer()->get('bsvk');
        $vk->setApiVersion('5.35');
        $vk->init('4319049', 'IbFXpul9VUtZdbIm9dvW');
        $albums = $vk->api('photos.getAlbums', array(
                'owner_id' => '-17550017',
                ''
            ));
        return $albums;
    }
}