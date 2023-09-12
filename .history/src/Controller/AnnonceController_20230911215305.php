<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'nnonce')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AnnonceController.php',
        ]);
    }

    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('Annonce/home.html.twig');
    
    }



}
