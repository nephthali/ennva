<?php

namespace Ennva\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class NavbarController extends Controller
{
    /**
     * @Route("/navbar")
     */
    public function indexAction()
    {
    	$pages = $this->getDoctrine()->getRepository('EnnvaWebsiteBundle:Pages')->findAll();

    	//echo "<pre>"; var_dump($pages); exit();
   		return $this->render('EnnvaWebsiteBundle:Layouts:navbar.html.twig', array('pages' => $pages));

   		//return $this->render('EnnvaWebsiteBundle:Default:'.$templates[0].'.html.twig');
    }
    
}
