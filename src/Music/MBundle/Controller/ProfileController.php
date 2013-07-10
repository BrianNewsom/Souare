<?php

namespace Music\MBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Song controller.
 */
class ProfileController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($slug)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('username' => $slug));

        if (!$user) {
            throw $this->createNotFoundException('Unable to find specified Profile');
        }

        return $this->render('MusicMBundle:Profile:show.html.twig', array(
            'user'      => $user,
        ));
    }



}