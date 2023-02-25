<?php

namespace App\Controller;

use App\Repository\MessRepository;
use App\Repository\UserRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

date_default_timezone_set('Asia/Ho_Chi_Minh');

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
     * @Route("/chat/{to<\d+>}", name="app_message")
     */
    public function chat(int $to, Request $req, UserRepository $userRepo, MessRepository $messRepo): Response
    {
        $user = $userRepo->find($to);

        if ($req->isXmlHttpRequest()) {
            $curAcc = $this->getUser();
            $from = $curAcc->getid();

            $conId = $messRepo -> getIdConversation($from,$to);

            $message = $req->request->get('message');
            $isNew = $req->request->get('new');
            if (!empty($message)){

                $now = new DateTime();
                $currentDatetime = $now->format('Y-m-d H:i:s');
                $messObj = $messRepo-> sendMessPerson($conId,$from,$message,$currentDatetime);
                
                $messs = [];
                $messs[] = [
                    'id'=>$messObj->getId(),
                    'userid'=>$messObj->getUser()->getId(),
                    'content'=>$messObj->getContent(),
                    'createAt'=>$messObj->getCreateAt()->format('Y-m-d H:i:s'),
                ];

                Return new JsonResponse($messs);  
            } elseif ($isNew=='yes') {
                $messObj = $messRepo->findBy(['conversation'=>$conId]);
                $messs = [];
                foreach ($messObj as $mess) {
                    $messs[] = [
                        'id'=>$mess->getId(),
                        'userid'=>$mess->getUser()->getId(),
                        'content'=>$mess->getContent(),
                        'createAt'=>$mess->getCreateAt()->format('Y-m-d H:i:s'),
                    ];
                }
                
                return new JsonResponse($messs);
                // Return new JsonResponse($messObj);
            } else {
                $messObj = $messRepo->findOneBy(['conversation'=>$conId],['createAt' => 'DESC']);
                $messs = [];
                $messs[] = [
                    'id'=>$messObj->getId(),
                    'userid'=>$messObj->getUser()->getId(),
                    'content'=>$messObj->getContent(),
                    'createAt'=>$messObj->getCreateAt()->format('Y-m-d H:i:s'),
                ];
                Return new JsonResponse(($messs));
            }
        }
        return $this->render('message/chat.html.twig',[
            'user'=>$user
        ]);
    }
}
