<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Faune;
use App\Entity\Flore;

class CaillouxFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Liste prédéfinie de nom de fleurs
        $nomFlore = [
            "Rose",
            "Tulipe",
            "Lys",
            "Orchidée",
            "Dahlia",
            "Pensée",
            "Muguet",
            "Lavande",
        ];

         // Liste prédéfinie de nom de fleurs
         $imageFlore = [
            "assets/images/Rose.png",
            "assets/images/Tulipe.png",
            "assets/images/Lys.png",
            "assets/images/Orchidée.png",
            "assets/images/Dahlia.png",
            "assets/images/Pensée.png",
            "assets/images/Muguet.png",
            "assets/images/Lavande.png",
        ];

        // Liste prédéfinie de nom de fleurs
        $descriptionFlore = [
            "La Rose est une fleur très parfumée",
            "La Tulipe est une fleur très colorée",
            "Le Lys est une fleur très élégante",
            "L'Orchidée est une fleur très exotique",
            "Le Dahlia est une fleur très géométrique",
            "La Pensée est une fleur très poétique",
            "Le Muguet est une fleur très printanière",
            "La Lavande est une fleur très odorante",
        ];

         // Liste prédéfinie de nom de faune
         $nomFaune = [
            "Lion",
            "Léopard",
            "Panthère",
            "Jaguar",
            "Guépard",
            "Lynx",
            "Puma",
            "Ocelot",
        ];

         // Liste prédéfinie de nom de faune
         $imageFaune = [
            "assets/images/Lion.png",
            "assets/images/Léopard.png",
            "assets/images/Panthère.png",
            "assets/images/Jaguar.png",
            "assets/images/Guépard.png",
            "assets/images/Lynx.png",
            "assets/images/Puma.png",
            "assets/images/Ocelot.png",
        ];

        // Liste prédéfinie de nom de fleurs
        $descriptionFaune = [
            "Le Lion est un animal très majestueux",
            "Le Léopard est un animal très tacheté",
            "La Panthère est un animal très noire",
            "Le Jaguar est un animal très tacheté",
            "Le Guépard est un animal très rapide",
            "Le Lynx est un animal très discret",
            "Le Puma est un animal très solitaire",
            "L'Ocelot est un animal très discret",
        ];
        
         // Création des entrées pour Flore
            foreach ($nomFlore as $index => $nom) {
                $flore = new Flore();
                $flore->setNom($nom);
                $flore->setImage($imageFlore[$index]);
                $flore->setDescription($descriptionFlore[$index]);
                $manager->persist($flore);
            }

            // Création des entrées pour Faune
            foreach ($nomFaune as $index => $nom) {
                $faune = new Faune();
                $faune->setNom($nom);
                $faune->setImage($imageFaune[$index]);
                $faune->setDescription($descriptionFaune[$index]);
                $manager->persist($faune);
            }

        $manager->flush();
    }
}
