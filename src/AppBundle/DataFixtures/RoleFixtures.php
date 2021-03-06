<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Auth\Role;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class RoleFixtures.
 */
class RoleFixtures implements FixtureInterface
{
    private const ROLES = [
        'ROLE_USER'        => 'Simple User (Read only)',
        'ROLE_ADMIN'       => 'Admin (Can manage things)',
        'ROLE_SUPER_ADMIN' => 'God (IT Team)',
    ];

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        foreach (self::ROLES as $role => $name) {
            $role = new Role($role);
            $role->setName($name);

            $manager->persist($role);
        }

        $manager->flush();
    }
}
