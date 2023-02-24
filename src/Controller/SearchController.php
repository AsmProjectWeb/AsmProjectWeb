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
                'avatar'=>$s->getAvatar(),
                'name'=>$s->getUsername(),
                'hometown'=>$s->getHometown(),
            ];
        }
        $groups = $group->findGroupByName($keyword,3);
        $dataGroup = [];
        foreach ($groups as $g){
            $dataGroup[]=[
                'id'=>$g->getId(),
                'avatar'=>$g->getGroupAvatar(),
                'name'=>$g->getGroupName(),
                'create'=>$g->getCreatedAt(),
            ];
        }
        $posts = $post->findPostByContent($keyword,3);
        $dataPost = [];
        foreach ($posts as $p){
            $dataPost[]=[
                'id'=>$p->getId(),
                'avatar'=>$p->getPostUserID()->getAvatar(),
                'name'=>$p->getPostUserID()->getUsername(),
                'create'=>$p->getDate(),
                'image'=>$p->getImage(),
                'content'=>$p->getContent(),
            ];
        }
        return $this->render("search/index.html.twig",['dataUser'=>$dataUser, 'dataGroup'=>$dataGroup, 'dataPost'=>$dataPost]);
    }
}
