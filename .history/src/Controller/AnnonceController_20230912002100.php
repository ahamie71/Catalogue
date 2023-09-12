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
    public function index( AnnonceRepository $annonceRepo)
    {   
        
        $annonces= $annonceRepo->findAll();
        return $this->render('Annonce/index.html.twig');
        ''
    }

    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('Annonce/home.html.twig');
    
    }



}
