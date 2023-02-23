<?php

namespace App\Controller;

use App\Repository\GroupsRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $req, PostRepository $post, UserRepository $user, GroupsRepository $group): Response
    {
        $keyword = $req->query->get('keyword');
        $users = $user->findUserByName($keyword,3);
        $dataUser = [];
        foreach ($users as $s){
            $dataUser[]=[
                'id'=>$s->getId(),
                'name'=>$s->getUsername(),
                'hometown'=>$s->getHometown(),
            ];
        }
        $groups = $group->findGroupByName($keyword,3);
        $dataGroup = [];
        foreach ($groups as $g){
            $dataGroup[]=[
                'id'=>$g->getId(),
                'name'=>$g->getGroupName(),
                'des'=>$g->getDescription(),
            ];
        }
        $posts = $post->findPostByContent($keyword,3);
        $dataPost = [];
        foreach ($posts as $p){
            $dataPost[]=[
                'id'=>$p->getId(),
                'name'=>$p->getPostUserID()->getUsername(),
                'image'=>$p->getImage(),
                'content'=>$p->getContent(),
            ];
        }
        return $this->json(array_merge($dataUser,$dataGroup,$dataPost));
    }
}
