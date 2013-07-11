<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function addTrackToSongAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $Track = $em->getRepository('MusicMBundle:Track')->find($id);
        if (!$Track) {
            throw $this->createNotFoundException('Unable to find specified Track');
        }
        //Create a form that lists all songs owned by this user, allow user to select, then add track to that song (Put that logic in model)!

        //If user wants to create a new song, for now send them to the addSong route

    }

}