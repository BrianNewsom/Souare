<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Track;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('MusicMBundle:Page:index.html.twig');
	}

	public function chartsAction()
	{
		return $this->render('MusicMBundle:Page:charts.html.twig');
	}

	public function addTrackAction(Request $request)
	{
	    $Track = new Track();
	    $form = $this->createFormBuilder($Track)
	        ->add('name')
	        ->add('instrument')
	        ->add('file')
	        ->getForm();

	    $form->handleRequest($request);

	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();

		    //$document->upload();

		    $em->persist($Track);
		    $em->flush();
		    
		    return $this->render('MusicMBundle:Track:show.html.twig', array(
        	    'Track'      => $Track,
    	    ));
		    //return $this->redirect($this->generateUrl('MusicMBundle_addtrack'));
		}
		/*return $this->render('MusicMBundle:Track:show.html.twig', array(
			'form' => $form->createView(), 
			'Track' => $Track,
			));*/
	    return $this->render('MusicMBundle:Page:addtrack.html.twig', array('form' => $form->createView()));
	}

	public function contactAction()
	{
		return $this->render('MusicMBundle:Page:contact.html.twig');
	}



}