<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface; 
use App\Entity\Livre; 
use App\Entity\Auteur;

class LivreController extends AbstractController
{

    #[Route("/ajouter-livre", name:"ajouter_livre")]
    
   public function ajouterLivre(EntityManagerInterface $entityManager): Response
   {
       // Création d'un nouvel auteur
       $auteur = new Auteur();
       $auteur->setNom("Nothomb");
       $auteur->setPrenom("Amélie");

       // Création d'un nouveau livre
       $livre = new Livre();
       $livre->setTitre("Hulk se marie");
       $livre->setDatePublication(new \DateTime());
       // Associer l'auteur au livre
       $livre->setAuteur($auteur);
       $entityManager->persist($auteur);
       $entityManager->persist($livre);
       $entityManager->flush();

       // Retourner une réponse
       return new Response("Livre et auteur ajoutés avec succès (Livre ID : ".$livre->getId().", Auteur ID : ".$auteur->getId().")");
   }
    // Afficher tous les livres
    #[Route('/livre', name: 'liste_livre')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $livres = $entityManager->getRepository(Livre::class)->findAll();
        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

  // Afficher un livre via son id
    #[Route('/livres/{id}', name:'livre_detail')]
    public function show(Livre $livre): Response
    {
        return $this->render('livre/detail.html.twig', [
            'livre' => $livre,
        ]);
    }
}
