<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

#[Route("/auteur", requirements: ["_locale" => "en|es|fr"], name: "livre_")]

class AuteurController extends AbstractController
{
    #[Route("/auteur/ajouter", name: "auteur_ajouter")]
    public function ajouterAuteur(EntityManagerInterface $entityManager): Response
    {
        $auteur = new Auteur();
        $auteur->setNom("Rostand");
        $auteur->setPrenom('Edmond');

        $entityManager->persist($auteur);
        $entityManager->flush();
    return new Response("Auteur sauvegardé avec l'id ". $auteur->getId());
    }

    
    #[Route("/auteur/{id}", name: "recuperer_auteur", requirements: ["id" => "\d+"])]
    public function afficherAuteur(int $id, EntityManagerInterface $entityManager):Response
    {
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);
        $livres = $auteur->getLivres();
        if (!$auteur) {
            throw $this->createNotFoundException(
                "Aucun auteur avec l'id ".$id
            );
        }
    return new Response('Titre : '. $auteur->getTitre());
    }
}
    
