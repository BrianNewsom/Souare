<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Document;
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
	    $document = new Document();
	    $form = $this->createFormBuilder($document)
	        ->add('name')
	        ->add('file')
	        ->getForm();

	    $form->handleRequest($request);

	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();

		    $document->upload();

		    $em->persist($document);
		    $em->flush();

		    return $this->redirect($this->generateUrl('MusicMBundle_addtrack'));
		}

	    return $this->render('MusicMBundle:Page:addtrack.html.twig', array('form' => $form->createView()));
	}

	public function contactAction()
	{
		return $this->render('MusicMBundle:Page:contact.html.twig');
	}



}