<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;
use Faker;
class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($nbGenre = 1;$nbGenre<=10;$nbGenre++){
            $genre = new Genre();
            $genre->setNom($faker->name);
            $manager->persist($genre);
        }
        $manager->flush();
    }
}
