<?php

namespace Casscroute\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casscroute\BlogBundle\Entity\Post;

class LoadPost implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //Recette de sandwich numéro 1
        $postSandwich1 = new Post();
        $postSandwich1->setTitle("Sandwich végétarien");
        $postSandwich1->setUrlAliasSlugified($postSandwich1->getTitle());
        $postSandwich1->setContent("

![](http://www.maredsousfromages.be/wp-content/uploads/2013/04/4.3.3-Sandwich-vegetarien.jpg)

# Ingrédients
- 1 baguette de pain
- 8 fines tranches de tomate
- 8 fines tranches de concombre
- 4 tranches de fromage
- 1 avocat *bien mûr*

# Préparation
## Étape 1
Laver les tomates et le concombre, puis les couper en tranches avec une mandoline.
## Étape 2
Écraser l'avocat avec une fourchette, le saler et le poivrer.
## Étape 3
Couper la baguette en deux dans la longueur. Les tartiner avec la purée d'avocat.
## Étape 4
Disposer sur la purée d'avocat les tranches de légumes et de fromage.
## Étape 5
Déguster!");

        $postSandwich1->setPublished(new \DateTime('NOW'));
        $manager->persist($postSandwich1);

        for ($i = 1; $i < 15; $i++)
        {
            $post = new Post();
            $post->setTitle("Article " . $i);
            $post->setUrlAliasSlugified($post->getTitle());
            $post->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porta velit faucibus, laoreet nibh sit amet, molestie dui. Nulla eu ante lectus. Ut tempus, felis a accumsan mattis, lectus mi lacinia diam, malesuada dictum mi ipsum et mi. Nulla cursus sem tellus, eu tincidunt mauris ornare eu. Mauris ut dui viverra mauris ultrices lacinia. Mauris non ante eleifend, scelerisque nulla vitae, aliquet ligula. Proin dui risus, tristique at tortor ultrices, maximus suscipit magna. Nullam felis magna, laoreet ac mattis sed, feugiat eu mi. Donec ut consectetur sapien, a interdum ipsum. Duis consequat enim non tellus laoreet ornare. Nullam et tristique risus, iaculis semper nibh.");
            $post->setPublished(new \DateTime("2015-01-01 10:00:" . $i));
            $manager->persist($post);
        }

        $manager->flush();
    }
}
