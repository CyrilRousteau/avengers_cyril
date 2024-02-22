<?php

namespace App\Controller;

use App\Entity\Faune;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FauneController extends AbstractController
{

//Ajout d'une méthode pour tester l ajout d'une image de faune en bdd
    #[Route('/cailloux/faune/ajouter-faune', name: 'ajouter_faune')]
    public function ajouterFauneSimple(EntityManagerInterface $entityManager): Response
    {
        // Création d'une nouvelle instance de Faune
        $faune = new Faune();
        $faune->setNom("Etrange animal");
        $faune->setDescription("Un animal particulier qui adore enseigner.");
        $faune->setImage("assets/images/Prof.png");
        $entityManager->persist($faune);
        $entityManager->flush();
        $urlListeFaune = $this->generateUrl('cailloux_faune');
        $htmlResponse = "Faune ajoutée avec succès avec l'ID : " . $faune->getId();
        $htmlResponse .= "<br><a href='" . $urlListeFaune . "'>Retour à la liste des faunes</a>";
        return new Response($htmlResponse);
    }


    #[Route('/cailloux/faune', name: 'cailloux_faune')]
    public function indexFaune(EntityManagerInterface $entityManager): Response
    {
        $faunes = $entityManager->getRepository(Faune::class)->findAll();

        return $this->render('faune/index.html.twig', [
            'faunes' => $faunes,
        ]);
    }
}

