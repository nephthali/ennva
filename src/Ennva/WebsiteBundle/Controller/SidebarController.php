<?php

namespace Ennva\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class SidebarController extends Controller
{
    public function indexAction(Request $request)
    {
    	$session = new Session();
    	$page_id = $session->get('page_id');
    	$id = $session->get('id_page');
    	
    	//Nota: Le variabile della request non vengono lette
    	if($request->get('id')){
    		$id_page = $request->get('id');
    	}elseif ($request->get('page_id')){
    		$id_page = $request->get('page_id');
    	}
    	
    	//Prendo le variabili dalla session se no esistono dalla request
    	if( empty($request->get('id')) ){
    		$id_page = $id;
    	} else {
    		if(empty($request->get('page_id'))){
	    		$id_page = $page_id;
    		}
    	}
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$page = $em->getRepository('EnnvaWebsiteBundle:Pages')->find(array('id' => $id_page ));
    	
    	return $this->render('EnnvaWebsiteBundle:Default:sidebar.html.twig', array('page' => $page));
    }
}
