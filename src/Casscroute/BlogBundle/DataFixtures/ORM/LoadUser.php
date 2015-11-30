<?php

namespace Casscroute\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Casscroute\BlogBundle\Entity\User;

class LoadUser implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //Classic user
        $normalUser = new User();
        $normalUser->setUsername("user");
        $normalUser->setEmail("user@gmail.com");
        $normalUser->setPlainPassword("user");
        $normalUser->setEnabled(true);
        $normalUser->setRoles(array("ROLE_USER"));
        $manager->persist($normalUser);

        //Administrator
        $adminUser = new User();
        $adminUser->setUsername("admin");
        $adminUser->setEmail("admin@gmail.com");
        $adminUser->setPlainPassword("admin");
        $adminUser->setEnabled(true);
        $adminUser->setRoles(array("ROLE_ADMIN"));
        $manager->persist($adminUser);

        $manager->flush();
    }
}
