<?php

namespace App\Controller;

use App\Entity\MarquePage;
use App\Entity\MotsCles;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/marque-pages', requirements: ["_locale" => "en|es|fr"], name: "marquepage_")]
class MarquePagesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $marque_pages = $entityManager->getRepository(MarquePage::class)->findAll();
        return $this->render('marque_pages/index.html.twig', [
            'marque_pages' => $marque_pages
        ]);
    }

    #[Route('/details/{id}', name:'details')]
    public function detail(EntityManagerInterface $entityManager, int $id): Response {
        $marquePage = $entityManager->getRepository(MarquePage::class)->find($id);
        if (!$marquePage) {
            throw $this->createNotFoundException("Le marque-page demandé n'existe pas");
        }
        return $this->render('marque_pages/detail.html.twig', [
            'marquePage' => $marquePage,
        ]);
    }

    #[Route('/ajouter-mot-cle/{idMarquePage}/{motCleTexte}', name: "ajouter_mot_cle")]
    public function ajoutMotCleMarquePage(EntityManagerInterface $entityManager, int $idMarquePage, string $motCleTexte): Response {
        // Récupérer le marque-page par son ID
        $marquePage = $entityManager->getRepository(MarquePage::class)->find($idMarquePage);

        if (!$marquePage) {
            return new Response("Marque page non trouvé.");
        }

        // Vérifier si le mot-clé existe déjà
        $motCle = $entityManager->getRepository(MotsCles::class)->findOneBy(['motCle' => $motCleTexte]);

        // Si le mot-clé n'existe pas, en créer un nouveau
        if (!$motCle) {
            $motCle = new MotsCles();
            $motCle->setMotCle($motCleTexte);
            $entityManager->persist($motCle);
            // Pas besoin de flush ici, le flush à la fin suffira pour enregistrer les nouvelles entités
        }

        // Ajouter le mot-clé au marque-page
        $marquePage->addMotsCle($motCle);

        $entityManager->persist($marquePage);
        $entityManager->flush();

        return new Response("Mot-clé ajouté avec succès au marque-page (id :" . $marquePage->getId() . ").");
    }


}