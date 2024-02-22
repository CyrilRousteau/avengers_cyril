<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuteurRepository;

class AuteurController extends AbstractController
{
    #[Route('/auteurs/plus-de-livres/{nombreMin}', name: 'auteurs_plus_de_livres')]
    public function auteursAvecPlusDeLivres(AuteurRepository $auteurRepository, int $nombreMin): Response
    {
        $auteurs = $auteurRepository->findAuteursAvecNombreLivresSupérieur($nombreMin);

        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
            'nombreMin' => $nombreMin,
        ]);
    }
}
