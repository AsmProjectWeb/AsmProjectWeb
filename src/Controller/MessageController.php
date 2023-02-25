<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/message")
 */

class MessageController extends AbstractController
{
    /**
     * @Route("/list", name="app_list")
     */
    public function list(Request $req, UserRepository $user): Response
    {
        if ($req->isXmlHttpRequest()) {
            $curAcc = $this->getUser();
            $id = $curAcc->getid();
            $name = $req->query->get('name');
            $users = $user->findFriendOfIdByName($id,$name);
            return new JsonResponse($users);
        }
        return $this->render('message/list.html.twig');

    }
    /**
     * @Route("/chat", name="app_message")
     */
    public function chat(): Response
    {
        return $this->render('message/chat.html.twig');
    }
}
