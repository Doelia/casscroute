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
            $post->setUrlAliasSlugified($post->getTitle());
            $post->setPublished(new \DateTime('NOW'));
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

        if ($post == null) {
            $request->getSession()->getFlashBag()->add('error', "Ce post n'existe pas.");
            return $this->render('CasscrouteBlogBundle:Blog:index.html.twig');
        }

        $form = $this->get('form.factory')->create(new PostType(), $post);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Post bien modifié.');
        }

        return $this->render('CasscrouteBlogBundle:Crud:edit.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $post = $postRepository->find($id);

        if ($post != null) {
            $em->remove($post);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Post bien supprimé.');
        } else {
            $request->getSession()->getFlashBag()->add('error', "Ce post n'existe pas.");
        }

        return $this->render('CasscrouteBlogBundle:Blog:index.html.twig');
    }
}
