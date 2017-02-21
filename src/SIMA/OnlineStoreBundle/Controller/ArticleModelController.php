<?php

namespace SIMA\OnlineStoreBundle\Controller;

use SIMA\OnlineStoreBundle\Entity\ArticleModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Articlemodel controller.
 *
 * @Route("articlemodel")
 */
class ArticleModelController extends Controller
{
    /**
     * Lists all articleModel entities.
     *
     * @Route("/", name="articlemodel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articleModels = $em->getRepository('SIMAOnlineStoreBundle:ArticleModel')->findAll();

        return $this->render('SIMAOnlineStoreBundle:articlemodel:index.html.twig', array(
            'articleModels' => $articleModels,
        ));
    }

    /**
     * Creates a new articleModel entity.
     *
     * @Route("/new", name="articlemodel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articleModel = new Articlemodel();
        $form = $this->createForm('SIMA\OnlineStoreBundle\Form\ArticleModelType', $articleModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articleModel);
            $em->flush($articleModel);

            return $this->redirectToRoute('articlemodel_show', array('id' => $articleModel->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:articlemodel:new.html.twig', array(
            'articleModel' => $articleModel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a articleModel entity.
     *
     * @Route("/{id}", name="articlemodel_show")
     * @Method("GET")
     */
    public function showAction(ArticleModel $articleModel)
    {
        $deleteForm = $this->createDeleteForm($articleModel);

        return $this->render('SIMAOnlineStoreBundle:articlemodel:show.html.twig', array(
            'articleModel' => $articleModel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing articleModel entity.
     *
     * @Route("/{id}/edit", name="articlemodel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ArticleModel $articleModel)
    {
        $deleteForm = $this->createDeleteForm($articleModel);
        $editForm = $this->createForm('SIMA\OnlineStoreBundle\Form\ArticleModelType', $articleModel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articlemodel_edit', array('id' => $articleModel->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:articlemodel:edit.html.twig', array(
            'articleModel' => $articleModel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articleModel entity.
     *
     * @Route("/{id}", name="articlemodel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ArticleModel $articleModel)
    {
        $form = $this->createDeleteForm($articleModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($articleModel);
            $em->flush($articleModel);
        }

        return $this->redirectToRoute('articlemodel_index');
    }

    /**
     * Creates a form to delete a articleModel entity.
     *
     * @param ArticleModel $articleModel The articleModel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArticleModel $articleModel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articlemodel_delete', array('id' => $articleModel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
