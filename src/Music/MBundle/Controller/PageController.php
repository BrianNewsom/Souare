<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\UploadMusic;
use Music\MBundle\Form\UploadMusicType;
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
	    $UploadMusic = new UploadMusic();
	    $form = $this->createFormBuilder($UploadMusic)
	        ->add('name')
	        ->add('file')
	        ->getForm();

	    $form->handleRequest($request);

	    if ($form->isValid()) {
	        $em = $this->getDoctrine()->getManager();

	        $em->persist($UploadMusic);
	        $em->flush();

	        return $this->redirect($this->generateUrl('MusicMBundle_contact'));
	    }

	    return array('form' => $form->createView());
	}

	public function contactAction()
	{
		return $this->render('MusicMBundle:Page:contact.html.twig');
	}



}