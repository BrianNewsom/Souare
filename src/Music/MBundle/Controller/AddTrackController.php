<?php
namespace Music\MBundle\Controller;
// ...
use Music\MBundle\Entity\UploadMusic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// ...

/**
 * @Template()
 */

class AddTrackController extends Controller
{
	$userinfo = $this->get_current_user(oid);
	echo $userinfo;
	public function uploadAction(Request $request)
	{
	    $UploadMusic = new UploadMusic();
	    $form = $this->createFormBuilder($UploadMusic)
	        ->add('name')
	        ->add('file')
	        ->getForm();

	    $form->handleRequest($request);

	    if ($form->isValid()) {
	        $em = $this->getDoctrine()->getManager();

	        $em->persist($UploadMusic);
	        $em->flush();

	        return $this->redirect($this->generateUrl('MusicMBundle_contact'));
	    }

	    return array('form' => $form->createView());
	}
}