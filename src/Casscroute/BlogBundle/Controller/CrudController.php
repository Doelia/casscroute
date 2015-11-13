<?php

namespace Casscroute\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Casscroute\BlogBundle\Entity\Post;
use Casscroute\BlogBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;

class CrudController extends Controller
{
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->get('form.factory')->create(new PostType(), $post);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $request-> getSession()->getFlashBag()->add('notice', 'Post bien enregistré.');
        }

        return $this->render('CasscrouteBlogBundle:Crud:new.html.twig', array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $post = $postRepository->find($id);
        $form = $this->get('form.factory')->create(new PostType(), $post);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $request-> getSession()->getFlashBag()->add('notice', 'Post bien modifié.');
        }

        return $this->render('CasscrouteBlogBundle:Crud:edit.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id)
    {
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('id' => $id));
    }
}
