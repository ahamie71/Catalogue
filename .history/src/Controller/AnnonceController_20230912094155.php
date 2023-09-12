<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
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
    public function create(Annonce $task = null, Request $request, EntityManagerInterface $entityManager)
    {
        if (!$task) {
            $t = new task();
        }
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$task->getId()) {

                $task->setDeadline($form->get('deadline')->getData());
                $task->setUser($this->getUser());
                $task->setIsDone(False);
            } else {
                if ($task->getUser() !== $this->getUser()) {
                    throw $this->createAccessDeniedException('Access denied.'); // Rediriger ou afficher une erreur si l'accès est refusé
                }

            }
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('showTask', ['id' => $task->getId()]);

        }
        return $this->render('task/create.html.twig', [
            'formTask' => $form->createView(),
            'editMode' => $task->getId() !== null
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