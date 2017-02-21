<?php

namespace SIMA\OnlineStoreBundle\Controller;

use SIMA\OnlineStoreBundle\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Picture controller.
 *
 * @Route("picture")
 */
class PictureController extends Controller
{
    /**
     * Lists all picture entities.
     *
     * @Route("/", name="picture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pictures = $em->getRepository('SIMAOnlineStoreBundle:Picture')->findAll();

        return $this->render('SIMAOnlineStoreBundle:picture:index.html.twig', array(
            'pictures' => $pictures,
        ));
    }

    /**
     * Creates a new picture entity.
     *
     * @Route("/new", name="picture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $picture = new Picture();
        $form = $this->createForm('SIMA\OnlineStoreBundle\Form\PictureType', $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $picture->getFileName();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('upload_folder_picture'),
                $fileName
            );

            // Set fileName Attribute with the name of the file
            $picture->setFileName($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush($picture);

            return $this->redirectToRoute('picture_show', array('id' => $picture->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:picture:new.html.twig', array(
            'picture' => $picture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a picture entity.
     *
     * @Route("/{id}", name="picture_show")
     * @Method("GET")
     */
    public function showAction(Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);

        return $this->render('SIMAOnlineStoreBundle:picture:show.html.twig', array(
            'picture' => $picture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing picture entity.
     *
     * @Route("/{id}/edit", name="picture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);

        if( $picture->getFileName() != "" )
        $picture->setFileName( new File($this->getParameter('upload_folder_picture').'/'.$picture->getFileName()));
        else
        $picture->setFileName( new File("",false));
        $editForm = $this->createForm('SIMA\OnlineStoreBundle\Form\PictureType', $picture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('picture_edit', array('id' => $picture->getId()));
        }

        return $this->render('SIMAOnlineStoreBundle:picture:edit.html.twig', array(
            'picture' => $picture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a picture entity.
     *
     * @Route("/{id}", name="picture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Picture $picture)
    {
        $form = $this->createDeleteForm($picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush($picture);
        }

        return $this->redirectToRoute('picture_index');
    }

    /**
     * Creates a form to delete a picture entity.
     *
     * @param Picture $picture The picture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Picture $picture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('picture_delete', array('id' => $picture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
