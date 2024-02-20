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
            "www.google.com",
            "www.facebook.com",
            "www.twitter.com",
            "www.linkedin.com",
            "www.github.com",
            "www.stackoverflow.com",
            "www.youtube.com",
            "www.wikipedia.org",
            "www.amazon.com",
            "www.ebay.com",
            "www.leboncoin.fr",
            "www.liberation.fr",
            "www.lemonde.fr",
            "www.laposte.fr",
            "www.labanquepostale.fr",
            "www.lcl.fr",
            "www.creditmutuel.fr",
            "www.banquepopulaire.fr",
            "www.caisse-epargne.fr",
            "www.societegenerale.fr",
            "www.boursorama.com",
            "www.ing.fr",
            "www.hellobank.fr",
            "www.orange.fr",
            "www.sfr.fr",
            "www.bouyguestelecom.fr",
            "www.free.fr",
            "www.ubuntu.com",
        ];
         // Liste prédéfinie d'url de marques pages x28
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
        for ($j = 0; $j < 15; $j++) {
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
                $motsClesAleatoires = [$motsClesAleatoires]; // Assurez-vous que c'est un tableau
            }
            foreach ($motsClesAleatoires as $index) {
                $marquePage->addMotsCle($motsCles[$index]);
            }

            $manager->persist($marquePage);
        }

        $manager->flush();
    }
}
