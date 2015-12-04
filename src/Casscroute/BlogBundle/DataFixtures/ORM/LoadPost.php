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

## Ingrédients
- 1 baguette de pain
- 8 fines tranches de tomate
- 8 fines tranches de concombre
- 4 tranches de fromage
- 1 avocat *bien mûr*
- 1 portion de fromage fondu
- 2 oeufs
- Quelques feuilles de salade

## Préparation
### Étape 1
Laver les tomates et le concombre, puis les couper en tranches avec une mandoline.
Mettre les oeufs à bouillir dans de l'eau pour une dizaine de minutes afin d'obtenir des oeufs durs.
### Étape 2
Écraser l'avocat avec une fourchette, le saler et le poivrer. Incorporer la portion de fromage à cette purée.
### Étape 3
Couper la baguette en deux dans la longueur. Les tartiner avec la purée avocat/fromage.
Découper les oeufs en tranches de l'épaisseur de votre choix.
### Étape 4
Disposer sur la purée d'avocat les tranches de légumes et de fromage. Ajouter les tranches d'oeuf. Finir garnir avec des feuilles de salade.
### Étape 5
Déguster!");

        $postSandwich1->setPublished(new \DateTime('NOW'));
        $manager->persist($postSandwich1);

        //Recette de sandwich numéro 1
        $postSandwich2 = new Post();
        $postSandwich2->setTitle("Sandwich ");
        $postSandwich2->setUrlAliasSlugified($postSandwich2->getTitle());
        $postSandwich2->setContent("

![](http://image.noelshack.com/fichiers/2015/49/1449225437-curried-chickpea-salad-sandwiches-9249.jpg)

## Ingrédients
- 2 tranches de pain de campagne
- 1 boîte de pois-chiches *égouttés et rincés*
- 2 cuillères à soupe de mayonnaise
- 2 cuillères à café de curry
- 1 cuillère à café de moutarde
- 1/2 oignon émincé **très finement**
- De la roquette *optionnel*

## Préparation
### Étape 1
Préparer la purée de pois-chiches en mettant dans un mixer les pois-chiches, la mayonnaise, la moutarde, le curry et les oignons
### Étape 2
Faire griller le pain. Disposer sur la première tranche les feuilles de roquette.
### Étape 3
Étaler la purée de pois-chiches sur la salade.
### Étape 4
Déguster!");

        $postSandwich2->setPublished(new \DateTime('NOW'));
        $manager->persist($postSandwich2);


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
