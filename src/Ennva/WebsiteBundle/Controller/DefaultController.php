<?php

namespace Ennva\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
       // return $this->render('EnnvaWebsiteBundle:Default:index.html.twig');
        return $this->render('EnnvaWebsiteBundle:Layouts:base.html.twig');
    }
}
