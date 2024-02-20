<?php

namespace App\Controller;

use App\Entity\Flore;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FloreController extends AbstractController
{
    #[Route('/cailloux/flore', name: 'cailloux_flore')]
    public function indexFlore(EntityManagerInterface $entityManager): Response
    {
        $flores = $entityManager->getRepository(Flore::class)->findAll();

        return $this->render('flore/index.html.twig', [
            'flores' => $flores,
        ]);
    }
}
