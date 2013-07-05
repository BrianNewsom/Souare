<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

	public function addtrackAction()
	{
		return $this->render('MusicMBundle:Page:addtrack.html.twig');
	}

	public function contactAction()
	{
		return $this->render('MusicMBundle:Page:contact.html.twig');
	}



}