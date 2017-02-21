<?php

namespace SIMA\OnlineStoreBundle\Controller;

use SIMA\OnlineStoreBundle\Entity\TechnicalDetailItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Technicaldetailitem controller.
 *
 * @Route("technicaldetailitem")
 */
class TechnicalDetailItemController extends Controller
{
    /**
     * Lists all technicalDetailItem entities.
     *
     * @Route("/", name="technicaldetailitem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $technicalDetailItems = $em->getRepository('SIMAOnlineStoreBundle:TechnicalDetailItem')->findAll();

        return $this->render('SIMAOnlineStoreBundle:technicaldetailitem:index.html.twig', array(
            'technicalDetailItems' => $technicalDetailItems,
        ));
    }

    /**
     * Creates a new technicalDetailItem entity.
     *
     * @Route("/new", name="technicaldetailitem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $technicalDetailItem = new Technicaldetailitem();
        $form = $this->createForm('SIMA\OnlineStoreBundle\Form\TechnicalDetailItemType', $technicalDetailItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($technicalDetailItem);
            $em->flush($technicalDetailItem);

            return $this->redirectToRoute('technicaldetailitem_show', array('id' => $technicalDetailItem->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:technicaldetailitem:new.html.twig', array(
            'technicalDetailItem' => $technicalDetailItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a technicalDetailItem entity.
     *
     * @Route("/{id}", name="technicaldetailitem_show")
     * @Method("GET")
     */
    public function showAction(TechnicalDetailItem $technicalDetailItem)
    {
        $deleteForm = $this->createDeleteForm($technicalDetailItem);

        return $this->render('SIMAOnlineStoreBundle:technicaldetailitem:show.html.twig', array(
            'technicalDetailItem' => $technicalDetailItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing technicalDetailItem entity.
     *
     * @Route("/{id}/edit", name="technicaldetailitem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TechnicalDetailItem $technicalDetailItem)
    {
        $deleteForm = $this->createDeleteForm($technicalDetailItem);
        $editForm = $this->createForm('SIMA\OnlineStoreBundle\Form\TechnicalDetailItemType', $technicalDetailItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('technicaldetailitem_edit', array('id' => $technicalDetailItem->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:technicaldetailitem:edit.html.twig', array(
            'technicalDetailItem' => $technicalDetailItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a technicalDetailItem entity.
     *
     * @Route("/{id}", name="technicaldetailitem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TechnicalDetailItem $technicalDetailItem)
    {
        $form = $this->createDeleteForm($technicalDetailItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($technicalDetailItem);
            $em->flush($technicalDetailItem);
        }

        return $this->redirectToRoute('technicaldetailitem_index');
    }

    /**
     * Creates a form to delete a technicalDetailItem entity.
     *
     * @param TechnicalDetailItem $technicalDetailItem The technicalDetailItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TechnicalDetailItem $technicalDetailItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('technicaldetailitem_delete', array('id' => $technicalDetailItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
