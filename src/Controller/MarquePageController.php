<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\MarquePage;
use Doctrine\ORM\EntityManagerInterface;

#[Route("/marque-page", requirements: ["_locale" => "en|es|fr"], name: "marque-page_")]

class MarquePageController extends AbstractController
{
    #[Route("/", name: "index")]
    public function index(EntityManagerInterface $entityManager): Response
    { $marquePages = $entityManager->getRepository(MarquePage::class)->findAll();

        return $this->render('liste/marque_page.html.twig', [
            'marquePages' => $marquePages,
        ]);
     }


     #[Route("/{id<\d+>}", name: "detail")]
     public function afficherDetailMarquePage(int $id, EntityManagerInterface $entityManager): Response
     {
         $marquePage = $entityManager->getRepository(MarquePage::class)->find($id);
         if (!$marquePage) {
             throw $this->createNotFoundException(
                 "Aucun marque-page avec l'id ".$id
             );
         }
         $lienVersPageDaccueilDesmarquesPages = $this->generateUrl('marque-page_index');
         return $this->render('marque-page/detail.html.twig', [
             'marquePage' => $marquePage,
             'lienVersPageDaccueilDesmarquesPages' => $lienVersPageDaccueilDesmarquesPages,
         ]);
     }


    #[Route("/ajouter", name: "marque-page_ajouter")]
    public function ajouterMarquePage(EntityManagerInterface $entityManager): Response
    {
        
        $marquePage = new MarquePage();
        $marquePage->setCommentaire("J'aime Symfony très très beaucoup");
        $marquePage->setDateCreation(new \DateTime());
        $marquePage->setUrl("Mon premier url");

        $entityManager->persist($marquePage);
        $entityManager->flush();
        $LienVersDetailMarquePage = $this->generateUrl('marque-page_detail', [
            'id' => $marquePage->getId(),
            ]);
    return $this->render('marque-page/ajout.html.twig', [
        'marquePage' => $marquePage,
        'LienVersDetailMarquePage' => $LienVersDetailMarquePage,
    ]);

    }
}
    
