<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
     {
         $this->encoder = $encoder;
     }
    public function load(ObjectManager $manager): void
    { 
        $faker = \Faker\Factory::create('fr_FR');
        $user = new User();
        $user->setEmail($faker->email);
        //$roles[] = 'ROLE_ADMIN';
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->encodePassword($user,'admin1234'));
        $manager->persist($user);
        $manager->flush();
    }
}