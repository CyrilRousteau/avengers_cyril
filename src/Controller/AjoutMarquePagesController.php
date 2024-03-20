<?php
namespace App\Controller;

use App\Entity\MarquePage;
use App\Form\Type\AjoutMarquePagesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class AjoutMarquePagesController extends AbstractController
{
    #[Route('/marque-page/ajout', name: 'marque_page_ajout')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $marquePage = new MarquePage();
        $form = $this->createForm(AjoutMarquePagesType::class, $marquePage);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($marquePage);
            $entityManager->flush();

            return $this->redirectToRoute('marquepage_index');
        }

        return $this->render('marque_pages/ajout.html.twig', [
            'mon_formulaire_ajout_marque_page' => $form->createView(),
        ]);
    }
}
