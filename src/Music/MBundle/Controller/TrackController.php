<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Track;
use Symfony\Component\HttpFoundation\Request;
use Music\MBundle\Entity\Task;
/**
 * Track controller.
 */
class TrackController extends Controller
{
    /**
     * Show a Track
     */
    public function showAction($id, Request $request)
    {
        $Track = $this->getTrack($id);

        $form = $this->createFormBuilder($Track)  /*# Add track to song button #}*/
            ->getForm();
        $form->handleRequest($request);
        //var_dump($Track);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('MusicMBundle_Track_addTrackToSong', array(
                'id' => $id,
            )));

        } 

        return $this->render('MusicMBundle:Track:show.html.twig', array(
            'Track'      => $Track, 'form' => $form->createView(),
        ));
    }

    public function addTrackToSongAction($id, Request $request)
    {
        $Track = $this->getTrack($id);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $task = new Task();
        //var_dump($Track);
        $form = $this->createFormBuilder($task)  /*# Add track to song button #}*/

            ->add('Song', 'choice', array('choices' => $user->songArray()))

            ->getForm();
        $form->handleRequest($request);       
        //var_dump($Track);
        if ($form->isValid()) {   
            $em = $this->getDoctrine()->getManager();

            $songId = $task->getSong();
            if ($songId == 'new')
            {
                return $this->redirect($this->generateUrl('MusicMBundle_addSongFromTrack', array('id' => $id)));                
            }
            $Song = $this->getDoctrine()
                ->getRepository('MusicMBundle:Song')
                ->find($songId);

            $Song->addTrack($Track);

            $em->persist($Song);
            $em->flush();
            return $this->redirect($this->generateUrl('MusicMBundle_Song_show', array('id' => $songId)));

            //return $this->redirect($this->generateUrl('MusicMBundle_homepage'));
        }
        
        return $this->render('MusicMBundle:Track:addtracktosong.html.twig', array(
            'Track' => $Track, 'form' => $form->createView(),
            ));
    }

    protected function getTrack($id)
    {
        $em = $this->getDoctrine()
                    ->getManager();

        $Track = $em->getRepository('MusicMBundle:Track')->find($id);

        if (!$Track) {
            throw $this->createNotFoundException('Unable to find Track.');
        }

        return $Track;
    }




}