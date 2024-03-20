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
        $auteur = new Auteur();
        $auteur->setNom("");
        $form = $this->createForm(AjoutAuteurType::class, $auteur); 
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
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

