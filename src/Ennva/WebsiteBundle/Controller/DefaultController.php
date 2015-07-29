<?php

namespace Ennva\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
    	
    	
    	
    	$templates = array("carousel_bootstrap", "carousel_jssor");
    	$choice = 1;
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$pages = $em->getRepository('EnnvaWebsiteBundle:Pages')->findAll();
    	
    	//echo "<pre>"; var_dump($pages[0]->getSubpages()); die;
    	

    	if($choice != 0)
    	{
    		return $this->render('EnnvaWebsiteBundle:Default:'.$templates[1].'.html.twig', array('pages' => $pages));
    	}
        return $this->render('EnnvaWebsiteBundle:Default:'.$templates[0].'.html.twig');
    }
    
    /**
     * @Route("/page/{id}", defaults={"id" = 1}, name="page")
     */
    public function pageAction(Request $request)
    {
    	$id = $request->get('id');
    	
    	$session = new Session();
    	$session->start();
    	
    	$session->set('id_page', $id);
    	
    	$page = $this->getDoctrine()->getRepository('EnnvaWebsiteBundle:Pages')->find($id);
    	
    	return $this->render('EnnvaWebsiteBundle:Default:page.html.twig', array('page' => $page));
    }
    
    /**
     * @Route("/page/{page_id}/subpage/{subpage_id}", defaults={"page_id" = 1, "subpage_id" = 1}, name="subpage")
     */
    public function subpageAction(Request $request)
    {
    	$subpage_id = $request->get('subpage_id');
    	$page_id = $request->get('page_id');
    	
    	$session = new Session();
    	$session->start();
    	 
    	$session->set('page_id', $page_id);
    	 
    	$subpage = $this->getDoctrine()->getRepository('EnnvaWebsiteBundle:Subpages')->find($subpage_id);
    	
    	//var_dump($subpage->getId()); die;
    	 
    	return $this->render('EnnvaWebsiteBundle:Default:page.html.twig', array('subpage' => $subpage));
    }
}
