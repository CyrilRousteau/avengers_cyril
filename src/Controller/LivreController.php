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
