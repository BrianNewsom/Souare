<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Music\MBundle\Entity\Track;
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
        $Track = new Track();
        $form = $this->createFormBuilder($Track)
            ->add('name')
            ->getForm();

        return $this->render('MusicMBundle:Track:show.html.twig', array(
            'Track'      => $Track,
        ));
    }



}