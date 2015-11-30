<?php

namespace Casscroute\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casscroute\BlogBundle\Entity\Post;

class LoadPost implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++)
        {
            $post = new Post();
            $post->setTitle("titre " . $i);
            $post->setUrlAliasSlugified($post->getTitle());
            $post->setContent("contenu " . $i);
            $post->setPublished(new \DateTime("2015-01-01 10:00:" . $i));
            $manager->persist($post);
        }

        $manager->flush();
    }
}
