<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Music\MBundle\Entity\Task;
use Music\MBundle\Entity\Track;
/**
 * Song controller.
 */
class SongController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $Song = $em->getRepository('MusicMBundle:Song')->find($id);
        if (!$Song) {
            throw $this->createNotFoundException('Unable to find specified Song');
        }


        return $this->render('MusicMBundle:Song:show.html.twig', array(
            'Song'      => $Song, 
        ));

    }

    public function addTrackToSongAction( Request $request, $Track)
    {
        $Track = $trackPassed;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $task = new Task();
        $form = $this->createFormBuilder($task)  /*# Add track to song button #}*/
            //->add('data')
            ->add('data', 'choice', array('choices' => $user->songArray()))//array('m' => 'Male', 'f' => 'Female'))) //$user->songArray()))//
            //->add('name') //so it won't autosubmit :(
            ->getForm();
        $form->submit($request);//handleRequest($request);       
        var_dump($Track);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //$em->persist($task);
            //$data = $task->getData();
            $data = $form->getData();
            var_dump($data);
            //$songId = $data['Song'];
           // var_dump($songId);
            $Song = $this->getDoctrine()
                ->getRepository('MusicMBundle:Song')
                ->find(1);
            $Song->addTrack($Track);
            $em->persist($Song);
            $em->flush();
            return $this->redirect($this->generateUrl('MusicMBundle_homepage'));
        }

        return $this->render('MusicMBundle:Song:addtracktosong.html.twig', array(
            'Track' => $Track, 'form' => $form->createView(),
            ));

        /*
        $em = $this->getDoctrine()->getManager();

        $Track = $em->getRepository('MusicMBundle:Track')->find($id);
        if (!$Track) {
            throw $this->createNotFoundException('Unable to find specified Track');
        }*/
/*
        $form = $this->createFormBuilder($Track)
            ->add('Song','select')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //$document->upload();
            $Song->addTrack($Track);

            $em->persist($Track);
            $em->flush();
            return $this->render('MusicMBundle:Page:addtracktosong.html.twig', array(
                'Track'      => $Track, 
            ));
            //return $this->redirect($this->generateUrl('MusicMBundle_addtrack'));
        }
        return $this->render('MusicMBundle:Page:addtracktosong.html.twig', array('form' => $form->createView()));
 */       
        //Create a form that lists all songs owned by this user, allow user to select, then add track to that song (Put that logic in model)!

        //If user wants to create a new song, for now send them to the addSong route

    }

}