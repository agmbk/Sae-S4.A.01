<?php

namespace App\Controller;

use App\Repository\EquipesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class Home extends AbstractController
{
    #[Route('/', name: '', methods: ['GET'])]
    #[Route('/index', name: 'index', methods: ['GET'])]
    #[Route('/home', name: 'home', methods: ['GET'])]
    public function index(EquipesRepository $equipesRepository): Response
    {
        var_dump(get_current_user());
        return $this->render('home/index.html.twig', [
            'controller_name' => '',
        ]);
    }
}
