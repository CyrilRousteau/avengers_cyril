<?php
namespace App\Controller;
use App\Entity\Auteur;
use App\Form\Type\AjoutAuteurType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class AjoutAuteurController extends AbstractController {
  
    #[Route('/auteur/ajout', name:'auteur_ajout')]
    public function ajoutAuteur(Request $request, ManagerRegistry $doctrine)
    {
        // Création d’un objet que l'on assignera au formulaire
        $auteur = new Auteur();
        $auteur->setNom(""); // Pour pré-renseigner des valeurs
        $form = $this->createForm(AjoutAuteurType::class, $auteur); 
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
        // $form->getData() : pour récupérer les données
        // Les données sont déjà stockées dans la variable d’origine
        // $auteur = $form->getData();
        // ... Effectuer le/les traitements(s) à réaliser
        // Par exemple :
        $entityManager = $doctrine->getManager();
        $entityManager->persist($auteur);
        $entityManager->flush();
        return $this->redirectToRoute('ajout_auteur_success');
        }
        return $this->render('auteur/ajout.html.twig', [
            'mon_formulaire_ajout_auteur' => $form->createView(),
        ]);
    }

    #[Route('/auteur/ajout_success', name: 'ajout_auteur_success')]
        public function ajoutSuccess() {
            return $this->render('auteur/ajout_success.html.twig');
        }

}

