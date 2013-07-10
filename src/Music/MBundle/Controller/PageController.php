<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Track;
use Music\MBundle\Entity\Song;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
	public function indexAction()
    {

        return $this->render('MusicMBundle:Page:index.html.twig');
    }
	/*public function indexAction()
	{
		return $this->render('MusicMBundle:Page:index.html.twig');
	}*/

	public function chartsAction()
	{
        $em = $this->getDoctrine()
                   ->getManager();

        $Tracks = $em->createQueryBuilder()
                    ->select('b')
                    ->from('MusicMBundle:Track',  'b')
                    ->addOrderBy('b.created', 'DESC')
                    ->getQuery()
                    ->getResult();
        return $this->render('MusicMBundle:Page:charts.html.twig', array(
            'Tracks' => $Tracks
        ));
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
		    $user = $this->getUser(); //Store who created the track
		    $Track->setCreator($user);

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

	public function addSongAction(Request $request)
	{
		$Song = new Song();
	    $form = $this->createFormBuilder($Song)
	        ->add('title')
	        ->getForm();
       	$em = $this->getDoctrine()
                   ->getManager();

        $Tracks = $em->createQueryBuilder()
                    ->select('b')
                    ->from('MusicMBundle:Track',  'b')
                    ->addOrderBy('b.created', 'DESC')
                    ->getQuery()
                    ->getResult();

	    $Song->setTracks($Tracks);
	    $form->handleRequest($request);
	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();

		    //$document->upload();
		    $user = $this->getUser(); //Store who created the track
		    $Song->setOwner($user);
			$user->addSong($Song);
		    $em->persist($Song);
		    $em->flush();
		    
		    return $this->render('MusicMBundle:Song:show.html.twig', array(
        	    'Song'      => $Song,
    	    ));
		    //return $this->redirect($this->generateUrl('MusicMBundle_addtrack'));
		}
		/*return $this->render('MusicMBundle:Track:show.html.twig', array(
			'form' => $form->createView(), 
			'Track' => $Track,
			));*/
	    return $this->render('MusicMBundle:Page:addsong.html.twig', array('form' => $form->createView()));

	}

	public function contactAction()
	{
		return $this->render('MusicMBundle:Page:contact.html.twig');
	}



}