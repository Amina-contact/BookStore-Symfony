<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use Faker;
class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($nbAuteur = 1;$nbAuteur<=20;$nbAuteur++){
            $auteur = new Auteur();
            $auteur->setNomPrenom($faker->name);
            //$sexe = $faker->randomElement(['F','H']);;
            $auteur->setSexe($faker->randomElement(['F','H']));
            $auteur->setDateDeNaissance($faker->dateTimeBetween());
            $auteur->setNationalite($faker->country);
            $manager->persist($auteur);
        }
        $manager->flush();
    }
}
