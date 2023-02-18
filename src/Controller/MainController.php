<?php

namespace App\Controller;

use App\Form\Login;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function loginAction(Request $request): Response
    {
        $form = $this->createForm(Login::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->json($data);
            // Do something with the form data
        }

        return $this->render('Tlogin.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request): Response
    {
        $form = $this->createForm(RegisterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->json($data);
            // Do something with the form data
        }

        return $this->render('Tregister.html.twig', [
            'form' => $form->createView(),
        ]);
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
