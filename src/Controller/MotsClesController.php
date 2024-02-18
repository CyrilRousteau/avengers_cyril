<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

#[Route("/mots-cles", requirements: ["_locale" => "en|es|fr"], name: "livre_")]

class MotsClesController extends AbstractController
{
    #[Route("/mots-cles/ajouter", name: "motsClefs_ajouter")]
    public function ajouterMotsClefs(EntityManagerInterface $entityManager): Response
    {
        $mots_cles = new MotsClefs();
        $mots_cles->setNom("Histoire");

        $entityManager->persist($mots_cles);
        $entityManager->flush();
    return new Response("Auteur sauvegardé avec l'id ". $mots_cles->getId());
    }

    
    #[Route("/auteur/{id}", name: "recuperer_mots_clefs", requirements: ["id" => "\d+"])]
    public function afficherMotsClefs(int $id, EntityManagerInterface $entityManager):Response
    {
        $mots_clefs = $entityManager->getRepository(MotsClefs::class)->find($id);
        $marque_pages = $mots_clefs->getMotsCles();
        if (!$auteur) {
            throw $this->createNotFoundException(
                "Aucun mot clef avec l'id ".$id
            );
        }
    return new Response('Mot cles : '. $auteur->getMotsCles());
    }
}
    
