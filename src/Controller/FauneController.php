<?php

namespace App\Controller;

use App\Entity\Faune;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FauneController extends AbstractController
{
    #[Route('/cailloux/faune', name: 'cailloux_faune')]
    public function indexFaune(EntityManagerInterface $entityManager): Response
    {
        $faunes = $entityManager->getRepository(Faune::class)->findAll();

        return $this->render('faune/index.html.twig', [
            'faunes' => $faunes,
        ]);
    }
}

