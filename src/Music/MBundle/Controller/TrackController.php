<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Track controller.
 */
class TrackController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $Track = $em->getRepository('MusicMBundle:Track')->find($id);
        if (!$Track) {
            throw $this->createNotFoundException('Unable to find Track');
        }

        return $this->render('MusicMBundle:Track:show.html.twig', array(
            'Track'      => $Track,
        ));
    }
}