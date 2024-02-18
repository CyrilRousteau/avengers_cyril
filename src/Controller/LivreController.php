<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;

#[Route("/livre", requirements: ["_locale" => "en|es|fr"], name: "livre_")]

class LivreController extends AbstractController
{
    #[Route("/livre/ajouter", name: "livre_ajouter")]
    public function ajouterLivre(EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $livre->setTitre("Cyrano de Bergerac");
        $livre->setAnneeParution(new \DateTime());
        $livre->setNbPages(42);
        $livre->setAuteur($auteur); 

        $entityManager->persist($auteur);
        $entityManager->persist($livre);
        $entityManager->flush();
    return new Response("Livre sauvegardé avec l'id ". $livre->getId());
    }

    #[Route("/livre/fiche/{id}", name: "livre_fiche", requirements: ["id" => "\d+"])]
    public function afficherLivre(int $id, EntityManagerInterface $entityManager):Response
    {
        $livre = $entityManager->getRepository(Livre::class)->find($id);
        $nomAuteur = $livre->getAuteur()->getNom();
        $prenomAuteur = $livre->getAuteur()->getPrenom();
        if (!$livre) {
            throw $this->createNotFoundException(
                "Aucun livre avec l'id ".$id
            );
        }
    return new Response('Titre : '. $livre->getTitre());
    }

}
    
