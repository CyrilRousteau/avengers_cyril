<?php
namespace App\Controller;

use App\Entity\MotsCles;
use App\Form\Type\AjoutMotsClesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class AjoutMotsClesController extends AbstractController
{
    #[Route('/mot-cle/ajout', name: 'mot_cle_ajout')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        $motCle = new MotsCles();
        $form = $this->createForm(AjoutMotsClesType::class, $motCle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($motCle);
            $entityManager->flush();

            return $this->redirectToRoute('marque_page_ajout');
        }

        return $this->render('mots_cles/ajout.html.twig', [
            'formMotsCles' => $form->createView(),
        ]);
    }
}
