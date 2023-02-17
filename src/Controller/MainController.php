<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="app_main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(): Response
    {
        return $this->render('Tlogin.html.twig', []);
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(): Response
    {
        return $this->render('Tregister.html.twig', []);
    }
    /**
     * @Route("/page", name="pgae")
     */
    public function page(): Response
    {
        return $this->render('homepage.html.twig', []);
    }
    /**
     * @Route("/header", name="header")
     */
    public function header(): Response
    {
        return $this->render('header.html.twig', []);
    }
}
