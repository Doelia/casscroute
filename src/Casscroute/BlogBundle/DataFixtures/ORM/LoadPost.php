<?php

namespace Casscroute\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casscroute\BlogBundle\Entity\Post;

class LoadPost implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 15; $i++)
        {
            $post = new Post();
            $post->setTitle("Article " . $i);
            $post->setUrlAliasSlugified($post->getTitle());
            $post->setContent("# Lorem ipsum
### dolor sit amet\n
consectetur adipiscing elit.\n
### Mauris porta velit faucibus\n
laoreet nibh sit amet, molestie dui. Nulla eu ante lectus. Ut tempus, felis a accumsan mattis, lectus mi lacinia diam, malesuada dictum mi ipsum et mi. Nulla cursus sem tellus, eu tincidunt mauris ornare eu. Mauris ut dui viverra mauris ultrices lacinia. Mauris non ante eleifend, scelerisque nulla vitae, aliquet ligula. Proin dui risus, tristique at tortor ultrices, maximus suscipit magna. Nullam felis magna, laoreet ac mattis sed, feugiat eu mi. Donec ut consectetur sapien, a interdum ipsum. Duis consequat enim non tellus laoreet ornare. Nullam et tristique risus, iaculis semper nibh.");
            $post->setPublished(new \DateTime("2015-01-01 10:00:" . $i));
            $manager->persist($post);
        }

        $manager->flush();
    }
}
