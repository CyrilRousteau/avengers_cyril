<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuteurRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Auteur;
use App\Form\Type\ModificationAuteurType;

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

    #[Route('/auteur/modifier/{id}', name: 'modifier_auteur')]
    public function modifierAuteur(Request $request, $id, ManagerRegistry $doctrine): Response {
        $entityManager = $doctrine->getManager();
        $auteur = $entityManager->getRepository(Auteur::class)->find($id);

        if (!$auteur) {
            throw $this->createNotFoundException('Aucun auteur trouvé pour l\'id ' . $id);
        }

        $form = $this->createForm(ModificationAuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager->flush();
            return $this->redirectToRoute('modification_auteur_success');
        }

        return $this->render('auteur/modifier.html.twig', [
            'mon_formulaire_modification_auteur' => $form->createView(),
        ]);
    }

    #[Route('/auteur/modification_success', name: 'modification_auteur_success')]
        public function modificationSuccess() {
            return $this->render('auteur/ajout_success_modification_auteur.html.twig');
        }
}