<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/helloWorld/{name}', name: 'helloWorld')]
    public function helloWorld(string $name, Request $request, UtilisateurRepository $articleRepository): Response
    {
        if ($name == 'JouJou')
            return $this->redirectToRoute('lucky');

        return $this->render('hello_world.html.twig', ['myName' => $name]);
    }

    #[Route('/lucky', name: 'lucky')]
    public function lucky(): Response
    {
        return $this->render('lucky.html.twig');
    }
}