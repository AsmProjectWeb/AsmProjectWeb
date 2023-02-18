<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="app_registration")
     */
    public function index(): Response
    {
        return $this->render('registration/index.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, 
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager): Response
    {
    $user = new User();
    $form = $this->createForm(RegisterType::class, $user);
    $form->handLeRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // encode the plain password
        $user->setPassword(
        $userPasswordHasher->hashPassword(
            $user,
            $form->get('password')->getData()
            )
        );
        $user->setRoles(['R0LE_USER']);
        $entityManager->persist($user);
        $entityManager->flush();
        // do anything else you need here, Like send an email

        return $this->redirectToRoute('login');
    }
    return $this->render('registration/index.htmL.twig', [

    'form' => $form->createView(),
    ]);
    }
}
