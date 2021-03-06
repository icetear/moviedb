<?php

namespace Dragonlands\MovieBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dragonlands\MovieBundle\Entity\Rating;
use Dragonlands\MovieBundle\Form\RatingType;

/**
 * Rating controller.
 *
 */
class RatingController extends Controller
{

    /**
     * Lists all Rating entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DragonlandsMovieBundle:Rating')->findAll();

        return $this->render('DragonlandsMovieBundle:Rating:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rating entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rating();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rating_show', array('id' => $entity->getId())));
        }

        return $this->render('DragonlandsMovieBundle:Rating:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rating entity.
     *
     * @param Rating $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rating $entity)
    {
        $form = $this->createForm(new RatingType(), $entity, array(
            'action' => $this->generateUrl('rating_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rating entity.
     *
     */
    public function newAction()
    {
        $entity = new Rating();
        $form   = $this->createCreateForm($entity);

        return $this->render('DragonlandsMovieBundle:Rating:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rating entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DragonlandsMovieBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DragonlandsMovieBundle:Rating:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rating entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DragonlandsMovieBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DragonlandsMovieBundle:Rating:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rating entity.
    *
    * @param Rating $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rating $entity)
    {
        $form = $this->createForm(new RatingType(), $entity, array(
            'action' => $this->generateUrl('rating_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rating entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DragonlandsMovieBundle:Rating')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rating entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rating_edit', array('id' => $id)));
        }

        return $this->render('DragonlandsMovieBundle:Rating:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rating entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DragonlandsMovieBundle:Rating')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rating entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rating'));
    }

    /**
     * Creates a form to delete a Rating entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rating_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
