<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\MarquePage;
use Doctrine\ORM\EntityManagerInterface;

class MarquePageController extends AbstractController
{

#[Route('/liste/marque-page', name: 'app_marque_page')]
public function liste(EntityManagerInterface $entityManager): Response
{
    $marquePages = $entityManager->getRepository(MarquePage::class)->findAll();

    return $this->render('liste/marque_page.html.twig', [
        'marquePages' => $marquePages,
    ]);
}

}