<?php
namespace BS\FrontBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('comur_getOrigin', array($this, 'comurGetOrigin')),
        );
    }

    public function comurGetOrigin($ref)
    {
        $info = pathinfo($ref);
        return $info['dirname'] . '/../' . $info['basename'];
    }

    public function getName()
    {
        return 'bs_app_front_extension';
    }
}