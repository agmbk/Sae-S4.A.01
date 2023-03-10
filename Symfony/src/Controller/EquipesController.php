<?php

namespace App\Controller;

use App\Entity\Equipes;
use App\Form\EquipesType;
use App\Repository\EquipesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/equipes')]
class EquipesController extends AbstractController
{
    #[Route('/', name: 'app_equipes_index', methods: ['GET'])]
    public function index(EquipesRepository $equipesRepository): Response
    {
        return $this->render('equipes/index.html.twig', [
            'equipes' => $equipesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_equipes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EquipesRepository $equipesRepository): Response
    {
        $equipe = new Equipes();
        $form = $this->createForm(EquipesType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equipesRepository->save($equipe, true);

            return $this->redirectToRoute('app_equipes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipes/new.html.twig', [
            'equipe' => $equipe,
            'form' => $form,
        ]);
    }

    #[Route('/{libelle}', name: 'app_equipes_show', methods: ['GET'])]
    public function show(Equipes $equipe): Response
    {
        return $this->render('equipes/show.html.twig', [
            'equipe' => $equipe,
        ]);
    }

    #[Route('/{libelle}/edit', name: 'app_equipes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Equipes $equipe, EquipesRepository $equipesRepository): Response
    {
        $form = $this->createForm(EquipesType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equipesRepository->save($equipe, true);

            return $this->redirectToRoute('app_equipes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipes/edit.html.twig', [
            'equipe' => $equipe,
            'form' => $form,
        ]);
    }

    #[Route('/{libelle}', name: 'app_equipes_delete', methods: ['POST'])]
    public function delete(Request $request, Equipes $equipe, EquipesRepository $equipesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $equipe->getLibelle(), $request->request->get('_token'))) {
            $equipesRepository->remove($equipe, true);
        }

        return $this->redirectToRoute('app_equipes_index', [], Response::HTTP_SEE_OTHER);
    }
}
