<?php
namespace BS\FrontBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use getjump\Vk\Core as VKCore;
use getjump\Vk\Auth as VKAuth;

class ParseVKCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('parser:vk')
            ->setDescription('Parse data form vk group')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start');
        $this->parse($input, $output);
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $output->writeln('End');
    }




    private function parse($input, $output)
    {
        $vk = VKCore::getInstance()->apiVersion('5.5');
        $auth = VKAuth::getInstance();
        $auth->setAppId('4319049')->setScope('photos,groups,status,wall,offline')
             ->setSecret('IbFXpul9VUtZdbIm9dvW')
             ->setRedirectUri('https://oauth.vk.com/blank.html'); // SETTING ENV
        // $url = $auth->getUrl();
        $token=$auth->startCallback();
            $vk->request('photos.getAlbums', ['need_covers' => 1, 'owner_id' => "-17550017"])->each(function($i, $v) use ($vk) {
                print($v->title . "\r\n");

                $vk->request('photos.get', ['album_id' => $v->id, 'owner_id' => "-17550017"])->each(function($i1, $v1) use ($vk) {
                    print($v1->id . "\r\n");
                    // $output->writeln( $v->last_name);
                });

            });
        // if($token) {
        //     $vk->setToken($token);
        //     $vk->request('users.get', ['user_ids' => range(1, 100)])->each(function($i, $v) {
        //         if($v->last_name == '') return;
        //         $output->writeln( $v->last_name);
        //     });
        // }
        // 'photos.getAlbums', array('uid'=>'id пользователя')
    }
}