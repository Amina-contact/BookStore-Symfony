<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Genre;
use Faker;
class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $auteurs = $manager->getRepository(Auteur::class)->findAll();
        $genres = $manager->getRepository(Genre::class)->findAll();
        for($nbLivre = 1;$nbLivre<=50;$nbLivre++){
            $livre = new Livre();
            $livre->setIsbn($faker->isbn13);
            $livre->setTitre($faker->title());
            $livre->setNombrePages($faker->randomNumber());
            $livre->setDateDeParution($faker->dateTimeBetween('-122 years','now'));
            $livre->setNote($faker->numberBetween(0,20));
            $livre->addAuteur($faker->randomElement($auteurs));
            $livre->addGenre($faker->randomElement($genres));
            $manager->persist($livre);
        }
        $manager->flush();
    }
}
