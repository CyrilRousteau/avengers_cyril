<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use App\Entity\Livre;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création de 15 auteurs
        for ($j = 0; $j < 15; $j++) {
            $auteur = new Auteur();
            $auteur->setNom('NomAuteur n°'.$j);
            $auteur->setPrenom('PrénomAuteur n°'.$j);
            $manager->persist($auteur);
            
            // Créons un livre pour chaque auteur créé
            $livre = new Livre();
            $livre->setTitre('Les Chroniques des Avengers'.$j);
            $year = mt_rand(1975, 2020);
            $datePublication = new \DateTime("$year-01-01"); // Utilisez une date fixe (1er janvier) de l'année générée
            $livre->setDatePublication($datePublication);
            $livre->setAuteur($auteur);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
