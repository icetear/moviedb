<?php

namespace Dragonlands\MovieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dragonlands\MovieBundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function indexAction()
    {

        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Tag');
        $tags = $repo->findAll();

        return $this->render('DragonlandsMovieBundle:Tags:index.html.twig', array('tags' => $tags));
    }

    /*
    *   show form for adding a new movie
    */
    public function newAction(Request $request)
    {
        $tag = new Tag();

        $form = $this->createFormBuilder($tag)
            ->add('name', 'text')
            ->add('save', 'submit', array('label' => 'Create Tag'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {

            //  persist the new movie
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('showTags');

        }

        return $this->render('DragonlandsMovieBundle:Tags:new.html.twig', array(
            'form' => $form->createView(),
            ));
    }


    /*
    *   show form for modifying an existing tag
    */
    public function modifyAction($id, Request $request)
    {

        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Tag');
        $tag = $repo->findOneById($id);
        
        $form = $this->createFormBuilder($tag)
            ->add('name', 'text')
            ->add('save', 'submit', array('label' => 'Save Tag'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {

            //  persist the new tag
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('showTags');

        }

        return $this->render('DragonlandsMovieBundle:Tags:new.html.twig', array(
            'form' => $form->createView(),
            ));
    }


    public function deleteAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('DragonlandsMovieBundle:Tag');
        $tag = $repo->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();

        return $this->redirectToRoute('showTags');        
    }

    public function getJsonSearchResultsForQueryAction(Request $request)
    {
        $term = $request->get('query');

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT t.name
            FROM DragonlandsMovieBundle:Tag t
            WHERE t.name LIKE :name
            ORDER BY t.name ASC'
            )->setParameter('name', $term.'%');

        $tags = $query->getResult();

        $response = new JsonResponse();
        $response->setData($tags);

        return $response;

    }

}
