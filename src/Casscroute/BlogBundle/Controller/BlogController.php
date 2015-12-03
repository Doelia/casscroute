<?php

namespace Casscroute\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $numberPerPage = 4;
        $posts = $postRepository->getPosts($page, $numberPerPage);
        $nbPages = ceil(count($posts)/$numberPerPage);

        if ($page > $nbPages) {
          throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }

        return $this->render('CasscrouteBlogBundle:Blog:index.html.twig', array(
            'posts'   => $posts,
            'nbPages' => $nbPages,
            'page'    => $page
        ));
    }

    public function postAction($alias)
    {
        $em = $this->getDoctrine()->getManager();
        $postRepository = $em->getRepository('CasscrouteBlogBundle:Post');
        $post = $postRepository->findOneByUrlAlias($alias);
        if (!$post) {
            throw $this->createNotFoundException('Le Post n\'existe pas.');
        }
        return $this->render('CasscrouteBlogBundle:Blog:post.html.twig', array('post' => $post));
    }
}
