<?php

namespace Casscroute\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $posts = $postRepository->findAll();
        return $this->render('CasscrouteBlogBundle:Blog:index.html.twig', array('posts' => $posts));
    }

    public function postAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $post = $postRepository->find($id);
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('post' => $post));
    }
}
