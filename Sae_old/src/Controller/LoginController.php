<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser() !== null) {
            return $this->redirectToRoute("app_logout");
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }

    #[Route('/login/redirect', name: 'app_login_redirect')]
    public function loginRedirect(Security $security): Response
    {
        if ($security->isGranted("ROLE_ADMIN")) {
            dd("admin");
            return $this->redirectToRoute("lucky");
        }

        if ($security->isGranted("ROLE_CLIENT")) {
            dd("client");
            return $this->redirectToRoute("lucky");
        }

        if ($security->isGranted("ROLE_OPERATEUR")) {
            dd("operateur");
            return $this->redirectToRoute("lucky");
        }

        if ($security->isGranted("ROLE_CHEF_ATELIER")) {
            dd("atelier");
            return $this->redirectToRoute("lucky");
        }

        return $this->redirectToRoute("app_logout");
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        //elle ne fait rien tkt
    }
}
