<?php

namespace Casscroute\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('CasscrouteBlogBundle:Blog:index.html.twig');
    }

    public function postAction($id)
    {
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('id' => $id));
    }
}
