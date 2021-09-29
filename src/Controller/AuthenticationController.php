<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationController extends AbstractController
{
    /**
     * @Route("/login", name="login-page")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $email = $authenticationUtils->getLastUsername();

        return $this->render('authentication/login.html.twig', [
            'error' => $error!==null,
            'email' => $email
        ]);
    }
    /**
     * @Route("/logout", name="logout-page")
     */
    public function logout()
    {
    }
    /**
     * @Route("/register", name="register-page")
     */
    public function register(): Response
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('authentication/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
