<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message")
 */

class MessageController extends AbstractController
{
    /**
     * @Route("/", name="app_message")
     */
    public function index(): Response
    {
        return $this->render('message/index.html.twig');
    }
    /**
     * @Route("/chat", name="app_message")
     */
    public function chat(): Response
    {
        return $this->render('message/chat.html.twig');
    }
}
