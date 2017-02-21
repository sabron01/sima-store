<?php

namespace SIMA\OnlineStoreBundle\Controller;

use SIMA\OnlineStoreBundle\Entity\ArticlePrice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Articleprice controller.
 *
 * @Route("articleprice")
 */
class ArticlePriceController extends Controller
{
    /**
     * Lists all articlePrice entities.
     *
     * @Route("/", name="articleprice_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articlePrices = $em->getRepository('SIMAOnlineStoreBundle:ArticlePrice')->findAll();

        return $this->render('SIMAOnlineStoreBundle:articleprice:index.html.twig', array(
            'articlePrices' => $articlePrices,
        ));
    }

    /**
     * Creates a new articlePrice entity.
     *
     * @Route("/new", name="articleprice_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articlePrice = new Articleprice();
        $form = $this->createForm('SIMA\OnlineStoreBundle\Form\ArticlePriceType', $articlePrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articlePrice);
            $em->flush($articlePrice);

            return $this->redirectToRoute('articleprice_show', array('id' => $articlePrice->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:articleprice:new.html.twig', array(
            'articlePrice' => $articlePrice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a articlePrice entity.
     *
     * @Route("/{id}", name="articleprice_show")
     * @Method("GET")
     */
    public function showAction(ArticlePrice $articlePrice)
    {
        $deleteForm = $this->createDeleteForm($articlePrice);

        return $this->render('SIMAOnlineStoreBundle:articleprice:show.html.twig', array(
            'articlePrice' => $articlePrice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing articlePrice entity.
     *
     * @Route("/{id}/edit", name="articleprice_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ArticlePrice $articlePrice)
    {
        $deleteForm = $this->createDeleteForm($articlePrice);
        $editForm = $this->createForm('SIMA\OnlineStoreBundle\Form\ArticlePriceType', $articlePrice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articleprice_edit', array('id' => $articlePrice->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:articleprice:edit.html.twig', array(
            'articlePrice' => $articlePrice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articlePrice entity.
     *
     * @Route("/{id}", name="articleprice_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ArticlePrice $articlePrice)
    {
        $form = $this->createDeleteForm($articlePrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($articlePrice);
            $em->flush($articlePrice);
        }

        return $this->redirectToRoute('articleprice_index');
    }

    /**
     * Creates a form to delete a articlePrice entity.
     *
     * @param ArticlePrice $articlePrice The articlePrice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArticlePrice $articlePrice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articleprice_delete', array('id' => $articlePrice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
