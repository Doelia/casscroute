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
        if ($form->handleRequest($request)->isValid()){
          $em = $this->getDoctrine()->getManager();
          $em->persist($advert);
          $em->flush();

          $request-> getSession()->getFlashBag()->add('notice', 'Post bien enregistré.');          
        }
        return $this->render('CasscrouteBlogBundle:Crud:new.html.twig', array('form' => $form->createView()));
    }

    public function editAction($id)
    {
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('id' => $id));
    }

    public function deleteAction($id)
    {
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('id' => $id));
    }
}
