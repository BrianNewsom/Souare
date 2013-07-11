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
        return $this->render('MusicMBundle:Track:show.html.twig', array(
            'Track'      => $Track,
        ));
    }




}