<?php
namespace App\Controller;
use App\Entity\Employe;
use App\Form\Type\AjoutEmployeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;

class AjoutEmployeController extends AbstractController
{
    #[Route('/employe/ajout', name:'employe_ajout')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $employe = new Employe();
        $form = $this->createForm(AjoutEmployeType::class, $employe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
         
            if ($employe->getAdresse()) { 
                $employe->getAdresse()->setEmploye($employe); 
            }
        
            $entityManager->persist($employe);

            $entityManager->flush();
        
            return $this->redirectToRoute('ajout_employe_success');
        }

        return $this->render('employe/ajout.html.twig', [
            'mon_formulaire_ajout_employe' => $form->createView(),
        ]);
    }

    #[Route('/employes', name: 'employe_index')]
public function index(ManagerRegistry $doctrine): Response
{
    $entityManager = $doctrine->getManager();
    
    $employes = $entityManager->getRepository(Employe::class)->findAll();
    
    return $this->render('employe/index.html.twig', [
        'employes' => $employes,
    ]);
}

#[Route('/employe/ajout_success', name: 'ajout_employe_success')]
    public function success(): Response
    {
        return $this->render('employe/ajout_success.html.twig');
    }

}
