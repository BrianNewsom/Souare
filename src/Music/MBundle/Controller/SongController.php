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

}