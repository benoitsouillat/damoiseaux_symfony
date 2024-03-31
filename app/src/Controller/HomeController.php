<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'root')]
    public function root(): Response
    {
        return $this->redirectToRoute('index');
    }

    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', []);
    }

    #[Route('/sommaire', name: 'sommaire')]
    public function sommaire(): Response
    {
        return $this->redirectToRoute('index');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->redirectToRoute('index');
    }
}