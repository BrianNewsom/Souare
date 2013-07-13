<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Track;
use Symfony\Component\HttpFoundation\Request;
/**
 * Track controller.
 */
class TrackController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $Track = $em->getRepository('MusicMBundle:Track')->find($id);
        if (!$Track) {
            throw $this->createNotFoundException('Unable to find Track');
        }

        $form = $this->createFormBuilder($Track)  /*# Add track to song button #}*/
            ->add('Add To My Song', 'submit')
            ->getForm();
        $form->handleRequest($request);
        //var_dump($Track);
        if ($form->isValid()) {
            return $this->render('MusicMBundle:Song:addtracktosong.html.twig', array(
                'id'      => $Track->getId(), 
            ));

                /*$response = $this->forward('MusicMBundle:Song:addTrackToSong', array(
                    //'id'  => $Track->getId(),
                    'Track' => $Track,
                ));
                return $response;*/
            //return $this->render('MusicMBundle:Page:addtracktosong.html.twig', array(
            //    'Track' => $Track,
            //));
        } /*on valid click move to addtrack twig */

        return $this->render('MusicMBundle:Track:show.html.twig', array(
            'Track'      => $Track, 'form' => $form->createView(),
        ));
    }




}