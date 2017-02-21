<?php

namespace SIMA\OnlineStoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIMAOnlineStoreBundle:Default:index.html.twig');
    }
}
