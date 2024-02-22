<?php

namespace App\Controller;

use App\Entity\Flore;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class FloreController extends AbstractController
{
    //Ajout d'une méthode pour tester l ajout d'une image de flore en bdd
    #[Route('/cailloux/flore/ajouter-flore', name: 'ajouter_flore')]
    public function ajouterFloreSimple(EntityManagerInterface $entityManager): Response
    {
        $flore = new Flore();
        $flore->setNom("Un arbre particulier");
        $flore->setDescription("Cet arbre ne se nourrit pas de soleil mais de connaissances");
        $flore->setImage("assets/images/Prof.png");
        $entityManager->persist($flore);
        $entityManager->flush();

        $urlListeFlore = $this->generateUrl('cailloux_flore');
        $htmlResponse = "Flore ajoutée avec succès avec l'ID : " . $flore->getId();
        $htmlResponse .= "<br><a href='" . $urlListeFlore . "'>Retour à la liste des flores</a>";

 return new Response($htmlResponse);
    }


    #[Route('/cailloux/flore', name: 'cailloux_flore')]
    public function indexFlore(EntityManagerInterface $entityManager): Response
    {
        $flores = $entityManager->getRepository(Flore::class)->findAll();

        return $this->render('flore/index.html.twig', [
            'flores' => $flores,
        ]);
    }
}
