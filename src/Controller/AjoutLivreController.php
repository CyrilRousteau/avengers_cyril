<?php
namespace App\Controller;
use App\Entity\Livre;
use App\Form\Type\AjoutLivreType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class AjoutLivreController extends AbstractController {
  
    #[Route('/livre/ajout', name:'livre_ajout')]
    public function ajoutLivre(Request $request, ManagerRegistry $doctrine)
    {
        $livre = new Livre();
        $livre->setTitre("");
        $form = $this->createForm(AjoutLivreType::class, $livre); 
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($livre);
        $entityManager->flush();
        return $this->redirectToRoute('ajout_success');
        }
        return $this->render('livre/ajout.html.twig', [
            'mon_formulaire_ajout_livre' => $form->createView(),
        ]);
    }

    #[Route('/livre/ajout_success', name: 'ajout_success')]
        public function ajoutSuccess() {
            return $this->render('livre/ajout_success.html.twig');
        }

}

