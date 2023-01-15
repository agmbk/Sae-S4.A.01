<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class Home extends AbstractController
{
    #[Route('/', name: '', methods: ['GET'])]
    #[Route('/index', name: 'index', methods: ['GET'])]
    #[Route('/home', name: 'home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'username' => $this->getUser()->getUserIdentifier(),
        ]);
    }
}
