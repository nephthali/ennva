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
    	$templates = array("carousel_bootstrap", "carousel_jssor");
    	$choice = 1;
    	
    	if($choice != 0)
    	{
    		return $this->render('EnnvaWebsiteBundle:Default:'.$templates[1].'.html.twig');
    	}
        return $this->render('EnnvaWebsiteBundle:Default:'.$templates[0].'.html.twig');
    }
}
