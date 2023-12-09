<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User as UserEntity;

class UserFixture extends Fixture
{
    public const USER_REFERENCE = 'User';

    public function load(ObjectManager $manager)
    {
        //on créer plusieurs utilisateurs
        $users =
        [
            [
                'username' => 'admin',
                'password' => password_hash('root', PASSWORD_BCRYPT),
                'email' => 'adelazzari8@gmail.com',
                'roles' => '1'
            ],
            [
                'username' => 'test',
                'password' => password_hash('root', PASSWORD_BCRYPT) ,
                'email' => 'test@gmail.com',
                'roles' => '0'
            ],
        ];

        foreach ($users as $user) {
            $userEntity = new UserEntity();
            $userEntity->setUsername($user['username']);
            $userEntity->setPassword($user['password']);
            $userEntity->setEmail($user['email']);
            $userEntity->setIsAdmin($user['roles']);
            $manager->persist($userEntity);
            $this->addReference(self::USER_REFERENCE.$user['username'], $userEntity);
        }

        $manager->flush();
    }
}