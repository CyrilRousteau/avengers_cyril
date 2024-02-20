<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use App\Entity\Livre;
use App\Entity\MarquePage;
use App\Entity\MotsCles;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Liste prédéfinie de titres de livres
        $titresDeLivres = [
            "L'ombre du vent",
            "Le labyrinthe des esprits",
            "La Cité des âmes perdues",
            "Le palais de minuit",
            "Les lumières de septembre",
            "Un parfum d'herbe coupée",
            "Marina",
            "Le jeu de l'ange",
            "Le prisonnier du ciel",
            "Melinda",
            "Le palais de midi",
            "Le voleur d'ombres",
            "Le prince de la brume",
            "Le palais des minuit",
            "Le livre des choses perdues",
            "Le palais de la nuit",
            "Le palais des ténèbres",
            "Le palais des miroirs",
            "Le palais des souvenirs",
            "Le palais des illusions",
            "Le palais des rêves",
            "Le palais des mensonges",
            "Le palais des murmures",
            "Le palais des ombres",
            "Le palais des secrets",
            "Le palais des regrets",
            "Le palais des promesses",
            "Le palais des passions",
        ];

        // Liste prédéfinie de prenoms d'auteurs
        $prenomAuteur = [
            "Jean",
            "Pierre",
            "Paul",
            "Jacques",
            "Marie",
            "Anne",
            "Sophie",
            "Luc",
            "Lucie",
            "François",
            "Françoise",
            "Marcel",
            "Marcelle",
            "Gérard",
            "Gérardine",
            "Gérardus",
            "Gérardina",
            "Gérardino",
            "Gérardine",
            "Gérardus",
            "Gérardina",
            "Francois",
            "Cyril",
            "Cyrille",
            "Cyrilus",
            "Cyrilina",
            "Cyrilino",
            "Cyriline",
        ];
        // Liste prédéfinie de noms d'auteurs
        $nomAuteur = [
            "Valgier",
            "Lefevre",
            "Durand",
            "Dupont",
            "Leroy",
            "Moreau",
            "Lambert",
            "Rousseau",
            "Fournier",
            "Petit",
            "Garcia",
            "Bonnet",
            "Chevalier",
            "Lemaire",
            "Perrin",
            "Guerin",
            "Robin",
            "Clement",
            "Morin",
            "Nicolas",
            "Henry",
            "Roussel",
            "Mathieu",
            "Gautier",
            "Masson",
            "Marchand",
            "Duval",
            "Denis",
        ];
        // Liste prédéfinie de mots cles
        $listeMotsCles = [
            "suspense",
            "aventure",
            "amour",
            "fantastique",
            "science-fiction",
            "policier",
            "thriller",
            "horreur",
            "humour",
            "poésie",
            "biographie",
            "histoire",
            "conte",
            "essai",
            "documentaire",
            "témoignage",
            "autobiographie",
            "journal",
            "carnet de voyage",
            "cuisine",
            "bricolage",
            "jardinage",
            "développement personnel",
            "bien-être",
            "santé",
        ];

        // Liste prédéfinie d'url de marques pages x28
        $urlMarquesPages = [
            "www.google1.com",
            "www.facebook1.com",
            "www.twitter1.com",
            "www.linkedin1.com",
            "www.github1.com",
            "www.stackoverflow1.com",
            "www.youtube1.com",
            "www.wikipedia1.org",
            "www.amazon1.com",
            "www.ebay1.com",
            "www.leboncoin1.fr",
            "www.liberation1.fr",
            "www.lemonde1.fr",
            "www.laposte1.fr",
            "www.labanquepostale1.fr",
            "www.lcl1.fr",
            "www.creditmutuel1.fr",
            "www.banquepopulaire1.fr",
            "www.caisse-epargne1.fr",
            "www.societegenerale1.fr",
            "www.boursorama1.com",
            "www.ing1.fr",
            "www.hellobank1.fr",
            "www.orange1.fr",
            "www.sfr1.fr",
            "www.bouyguestelecom1.fr",
            "www.free1.fr",
            "www.ubuntu1.com",
        ];
         // Liste prédéfinie de commentaires de marques pages x28
         $commentairesMarquesPages = [
            "Chapitre IV",
            "Epilogue",
            "Page 42",
            "Page 666",
            "Page 1",
            "Page 2",
            "Page 3",
            "Chapiitre 1", 
            "Chapitre 2",
            "Chapitre 3",
            "Chapitre 4",
            "Chapitre 5",
            "Chapitre 6",
            "Resume",
            "Introduction",
            "Conclusion",
            "Bibliographie",
            "Annexe",
            "Index",
            "Glossaire",
            "Table des matières",
            "Table des illustrations",
            "Table des figures",
            "Table des tableaux",
            "Table des schémas",
            "Table des graphiques",
            "Table des photos",
            "Table des annexes",
        ];


        // Création de 15 auteurs
        for ($j = 0; $j < 28; $j++) {
            $auteur = new Auteur();
            $nomAleatoire = $nomAuteur[$j];
            $prenomAleatoire = $prenomAuteur[$j];
            $auteur->setNom($nomAleatoire);
            $auteur->setPrenom($prenomAleatoire);
            $manager->persist($auteur);
            // Créons un livre pour chaque auteur créé
            $livre = new Livre();
            // Sélectionner un titre aléatoire pour le livre
            $titreAleatoire = $titresDeLivres[array_rand($titresDeLivres)];
            $livre->setTitre($titreAleatoire);
            $year = mt_rand(1970, 2020);
            $month = mt_rand(1, 12);
            $day = mt_rand(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
            $datePublication = new \DateTime("$year-$month-$day");
            $livre->setDatePublication($datePublication);
            $livre->setAuteur($auteur);
            $manager->persist($livre);
        }

         // Création de 25 mots-clés
         $motsCles = [];
         foreach ($listeMotsCles as $nomMotCle) {
             $motCle = new MotsCles();
             $motCle->setMotCle($nomMotCle);
             $manager->persist($motCle);
             $motsCles[] = $motCle;
         }

        // Création de 28 marques-pages
        for ($i = 0; $i < 28; $i++) {
            $marquePage = new MarquePage();
            $marquePage->setUrl($urlMarquesPages[$i]);
            $marquePage->setCommentaire($commentairesMarquesPages[$i]);
            // Génération aléatoire de la date de création
            $year = mt_rand(2010, 2023);
            $month = mt_rand(1, 12);
            $day = mt_rand(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
            $dateCreation = new \DateTime("$year-$month-$day");
            $marquePage->setDateCreation($dateCreation);

            // Ajout aléatoire de 2 à 5 mots-clés à chaque marque-page
            $nombreMotsCles = mt_rand(2, 5);
            $motsClesAleatoires = array_rand($motsCles, $nombreMotsCles);
            if (!is_array($motsClesAleatoires)) {
                $motsClesAleatoires = [$motsClesAleatoires];
            }
            foreach ($motsClesAleatoires as $index) {
                $marquePage->addMotsCle($motsCles[$index]);
            }

            $manager->persist($marquePage);
        }

        $manager->flush();
    }
}
