<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonce', name: 'Annonce')]
    public function index(): JsonResponse
    {
      
    }

    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('Annonce/home.html.twig');
    
    }



}
