<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'Annonce')]
    public function index(AnnonceRepository $annonceRepo)
    {

        $annonces = $annonceRepo->findAll();
        return $this->render('Annonce/index.html.twig', [
            'annonces' => $annonces,
        ]);

    }
       

    #[Route('/task/newTask', name: 'create')]
#[Route("/task/{id}/edit", name: "edit")]
public function create(Request $request, EntityManagerInterface $entityManager, Annonce $annonce = null)
{
    if (!$annonce) {
        $annonce = new Annonce();
    }

    $form = $this->createForm(AnnonceType::class, $annonce);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Pas besoin de configurer manuellement les propriétés ici, Symfony le fait pour vous

        $entityManager->persist($annonce);
        $entityManager->flush();

        // Redirigez vers la page de détails de l'annonce nouvellement créée
        return $this->redirectToRoute('ShowOneAnnonce', ['id' => $annonce->getId()]);
    }

    return $this->render('task/create.html.twig', [
        'formTask' => $form->createView(),
        'editMode' => $annonce->getId() !== null
    ]);
}


    #[Route('/annonce/{id}', name: 'ShowOneAnnonce')]
    public function showOneAnnonce(Annonce $annonce)
    {
        return $this->render('Annonce/showOneAnnonce.html.twig', [
            'annonce' => $annonce,
        ]);
    }


    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('Annonce/home.html.twig');

    }



}