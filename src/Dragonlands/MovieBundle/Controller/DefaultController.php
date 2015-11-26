<?php

namespace Dragonlands\MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragonlands\MovieBundle\Entity\Movie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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

}
