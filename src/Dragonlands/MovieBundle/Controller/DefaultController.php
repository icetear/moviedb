<?php

namespace Dragonlands\MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragonlands\MovieBundle\Entity\Movie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {

    	$repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Movie');
    	$movies = $repo->findAll();

        return $this->render('DragonlandsMovieBundle:Default:index.html.twig', array('movies' => $movies));
    }

    /*
    *   show form for adding a new movie
    */
    public function newAction(Request $request)
    {
        $movie = new Movie();

        //  what user is logged in? this information will be saved with the movie
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $movie->setUser($user);

        $form = $this->createFormBuilder($movie)
            ->add('titleOrig', 'text')
            ->add('titleDe', 'text')
            ->add('year', 'text')
            ->add('length', 'text')
            ->add('imdbId', 'text')
            ->add('save', 'submit', array('label' => 'Create Movie'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {

            //  persist the new movie
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('homepage');

        }

        return $this->render('DragonlandsMovieBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
            ));
    }

    /**
     * Finds and displays a Rating entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DragonlandsMovieBundle:Movie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Movie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DragonlandsMovieBundle:Default:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Movie entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deleteMovie', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
    /*
    *   show form for modifying an existing movie
    */
    public function modifyAction($id, Request $request)
    {

        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Movie');
        $movie = $repo->findOneById($id);
        
        $form = $this->createFormBuilder($movie)
            ->add('titleOrig', 'text')
            ->add('titleDe', 'text')
            ->add('year', 'text')
            ->add('length', 'text')
            ->add('imdbId', 'text')
            ->add('save', 'submit', array('label' => 'Save Movie'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {

            //  persist the new movie
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('homepage');

        }

        return $this->render('DragonlandsMovieBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
            ));
    }


    public function deleteAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Movie');
        $movie = $repo->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($movie);
        $em->flush();

        return $this->redirectToRoute('homepage');        
    }


    public function getomdbinfoAction(Request $request)
    {
        //  fetch the id from the request
        $id = $request->get('id');

        //  get the info from the OMDB site


        //  return the info
        $response = array("code" => 100, "success" => true, "titleOrig" => "MyTitle");
        return new Response(json_encode($response));

    }


}
