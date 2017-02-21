<?php

namespace SIMA\OnlineStoreBundle\Controller;

use SIMA\OnlineStoreBundle\Entity\CharacteristicType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Characteristictype controller.
 *
 * @Route("characteristictype")
 */
class CharacteristicTypeController extends Controller
{
    /**
     * Lists all characteristicType entities.
     *
     * @Route("/", name="characteristictype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $characteristicTypes = $em->getRepository('SIMAOnlineStoreBundle:CharacteristicType')->findAll();

        return $this->render('characteristictype/index.html.twig', array(
            'characteristicTypes' => $characteristicTypes,
        ));
    }

    /**
     * Creates a new characteristicType entity.
     *
     * @Route("/new", name="characteristictype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $characteristicType = new Characteristictype();
        $form = $this->createForm('SIMA\OnlineStoreBundle\Form\CharacteristicTypeType', $characteristicType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($characteristicType);
            $em->flush($characteristicType);

            return $this->redirectToRoute('characteristictype_show', array('id' => $characteristicType->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:characteristictype:new.html.twig', array(
            'characteristicType' => $characteristicType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a characteristicType entity.
     *
     * @Route("/{id}", name="characteristictype_show")
     * @Method("GET")
     */
    public function showAction(CharacteristicType $characteristicType)
    {
        $deleteForm = $this->createDeleteForm($characteristicType);

        return $this->render('SIMAOnlineStoreBundle:characteristictype:show.html.twig', array(
            'characteristicType' => $characteristicType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing characteristicType entity.
     *
     * @Route("/{id}/edit", name="characteristictype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CharacteristicType $characteristicType)
    {
        $deleteForm = $this->createDeleteForm($characteristicType);
        $editForm = $this->createForm('SIMA\OnlineStoreBundle\Form\CharacteristicTypeType', $characteristicType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('characteristictype_edit', array('id' => $characteristicType->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:characteristictype:edit.html.twig', array(
            'characteristicType' => $characteristicType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a characteristicType entity.
     *
     * @Route("/{id}", name="characteristictype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CharacteristicType $characteristicType)
    {
        $form = $this->createDeleteForm($characteristicType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($characteristicType);
            $em->flush($characteristicType);
        }

        return $this->redirectToRoute('characteristictype_index');
    }

    /**
     * Creates a form to delete a characteristicType entity.
     *
     * @param CharacteristicType $characteristicType The characteristicType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CharacteristicType $characteristicType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('characteristictype_delete', array('id' => $characteristicType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
