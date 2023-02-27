<?php

namespace App\Controller;

use App\Entity\Friend;
use App\Entity\FriendRequest;
use App\Entity\Post;
use App\Entity\Report;
use App\Entity\Typegoup;
use App\Entity\User;
use App\Form\LoginType;
use App\Form\PostType;
use App\Form\RegisterType;
use App\Form\TypegoupType;
use App\Repository\CommentRepository;
use App\Repository\FriendRepository;
use App\Repository\FriendRequestRepository;
use App\Repository\GroupMembersRepository;
use App\Repository\GroupPostRepository;
use App\Repository\GroupsRepository;
use App\Repository\PostLikedRepository;
use App\Repository\PostRepository;
use App\Repository\ReportRepository;
use App\Repository\TypegoupRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

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

    // /**
    //  * @Route("/login", name="login")
    //  */
    // public function loginAction(Request $request): Response
    // {
    //     $form = $this->createForm(LoginType::class);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $data = $form->getData();
    //         return $this->json($data);
    //         // Do something with the form data
    //     }

    //     return $this->render('Tlogin.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/register", name="register")
    //  */
    // public function registerAction(Request $request): Response
    // {
    //     $form = $this->createForm(RegisterType::class);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $data = $form->getData();
    //         return $this->json($data);
    //         // Do something with the form data
    //     }

    //     return $this->render('Tregister.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/page", name="page")
    //  */
    // public function page(): Response
    // {
    //     return $this->render('homepage.html.twig', []);
    // }

    private $security;
    private PostRepository $repo;
    public function __construct(PostRepository $repo, Security $security)
    {
      $this->repo = $repo;
      $this->security = $security;
    }

    /**
     * @Route("/page", name="page")
     */
    public function page(Request $req,GroupsRepository $grepo, SluggerInterface $slugger, UserRepository $userRepository, PostRepository $post, FriendRepository $frepo, FriendRequestRepository $frieReRepo): Response
    {
        $p = new Post();
        $form = $this -> createForm(PostType::class, $p);
        // return $this->json($p);
        // if($req->request->get('button-post'))
        // {
            // return $this->json($p);
            $form->handleRequest($req);
            if($form->isSubmitted() && $form->isValid()){
    
                // return $this->json($p);
    
                if($p->getDate()===null){
                    $p->setDate(new \DateTime());
                }
                $imgFile = $form->get('image')->getData();
                if ($imgFile) {
                    $newFilename = $this->uploadImage($imgFile,$slugger);
                    $p->setImage($newFilename);
                }
                $this->repo->add($p,true);
                return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
            }
        // }
        $user=$this->security->getUser();
        $userid = $user->getId();

        $posts = $post->findPostsForUser($userid);
        $friends = $frepo->findFriendsByUserId($userid);
        $group = $grepo->findGroupsByUserId($userid);
        $friendRequestObj = $frieReRepo->findBy(['receiver'=>$userid]);
        $friendRequest = [];
        foreach ($friendRequestObj as $friend ) {
            $friendRequest[] = [
                'reqid'=>$friend->getId(),
                'id'=>$friend->getSender()->getId(),
                'avatar'=>$friend->getSender()->getAvatar(),
                'name'=>$friend->getSender()->getUsername(),
            ];
        }
        return $this->render('homepage.html.twig', [
            'posts' => $posts,
            'form' => $form->createView(),
            'friend'=> $friends,
            'group'=>$group,
            'friendRe'=>$friendRequest,
        ]);
        // return $this->json($friendRequest);
    }

    public function uploadImage($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
        try {
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFilename
            );
        } catch (FileException $e) {
            echo $e;
        }
        return $newFilename;
    }

    /**
     * @Route("/header", name="header")
     */
    public function header(): Response
    {
        return $this->render('header.html.twig', []);
    }
    /**
     * @Route("/profile", name="profile", methods={"GET"})
     */
    public function profileAction(Request $request, FriendRepository $friendRepo, PostRepository $postRepo, UserRepository $userRepo, FriendRequestRepository $frieRe): Response
    {
        // $id = $request->get('id');
        $user=$this->security->getUser();
        $userid = $user->getId();

        $id = $request->query->get('id');
        $user = $userRepo->find($id);
        $post = $postRepo->findPostsInProfile($id);
        $friend = $friendRepo->findFriendsUserById($id);
        if (($friendRepo->isFriend($userid,$id))>0){
            $isFriend = 'true';
        } else {
            $isFriend = 'false';
        }

        if (($frieRe->isWaiting($userid,$id))>0){
            $isWaiting = 'true';
        } else {
            $isWaiting = 'false';
        }

        return $this->render('profile.html.twig', [
            'id'=>$id,
            'post'=>$post,
            'user'=>$user,
            'friend'=>$friend,
            'isFriend'=>$isFriend,
            'isWaiting'=>$isWaiting,
        ]); 

        return $this->json($user);
    }
    /**
     * @Route("/friendrequest", name="friendrequest", methods={"GET"})
     */
    public function friendRequest(Request $request, FriendRequestRepository $frieRe): Response
    {
        $from = $request->query->get('from');
        $to = $request->query->get('to');
        $frieRe->addFriendRequest($from, $to);
        return $this->redirectToRoute('profile',['id'=>$to]);
    }

    /**
     * @Route("/acceptfriendrequest", name="acceptfriendrequest", methods={"GET"})
     */
    public function acceptFriendRequest(Request $request, FriendRequestRepository $frieRe, FriendRepository $frie): Response
    {
        $reqid = $request->query->get('id');
        $frieReq = $frieRe->find($reqid);
        $from = $frieReq->getSender()->getId();
        $to = $frieReq->getReceiver()->getId();
        // $from = $request->query->get('from');
        // $to = $request->query->get('to');
        $frie->addFriend($from, $to);
        $frieRe->remove($frieReq,true);

        return $this->redirectToRoute('page');
    }

    /**
     * @Route("/denyfriendrequest", name="denyfriendrequest", methods={"GET"})
     */
    public function denyFriendRequest(Request $request, FriendRequestRepository $frieRe, FriendRepository $frie): Response
    {
        $reqid = $request->query->get('id');
        $frieReq = $frieRe->find($reqid);
        $frieRe->remove($frieReq,true);

        return $this->redirectToRoute('page');
    }

    /**
     * @Route("/group", name="profile_group", methods={"GET"})
     */
    public function groupAction(Request $req, GroupsRepository $groupRepo, GroupMembersRepository $gmRepo, PostRepository $postRepo): Response
    {   
        $id = $req->query->get('id');
        $user = $this->getUser();
        $userId = $user->getId();
        $group = $groupRepo->find($id);
        $post = $postRepo->findPostsInGroup($id);
        $userGroup = $gmRepo->findUserInGroup($id, $userId);
        return $this->render('groupProfile.html.twig', [
            'group'=>$group,
            'user'=>$userGroup,
            'post'=>$post,
        ]);
        // return $this->json($ava);
    }

    /**
    * @Route("/admin", name="admin_page")
    */
    public function admin(Request $request, PostRepository $postRepo,TypegoupRepository $typeRepo ): Response
    {
        // $id = $request->query->get('id');
        $post = $postRepo->findPostsReported();
        $type = $typeRepo->findAll();
        return $this->render('admin.html.twig', [
            'post'=>$post,
            'type'=>$type,
        ]);
        // return $this->json($post);
    }
    /**
     * @Route("/newtype", name="newtype")
     */
    public function addType(Request $req,TypegoupRepository $typeRepo ): Response
    {
        $type = $req->query->get('newtype');
        $addnewtype = $typeRepo->addType($type);
        return $this->redirectToRoute('admin_page', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/edittype", name="Edit_type", methods={"GET"})
     */
    public function edittypeAction(Request $req,TypegoupRepository $typeRepo ): Response
    {
        $id = $req->query->get('idedittype');
        $edittype = $req->query->get('edittype');
        $update = $typeRepo->editType($id,$edittype); 
        return $this->redirectToRoute('admin_page', [], Response::HTTP_SEE_OTHER);
        // return $this->json($id);
    }
        /**
     * @Route("/deletetype", name="Delete_type", methods={"GET"})
     */
    public function deletetypeAction(Request $req,TypegoupRepository $typeRepo ): Response
    {
        $id = $req->query->get('id');
        $delete = $typeRepo->deleteType($id);
        return $this->redirectToRoute('admin_page', [], Response::HTTP_SEE_OTHER);
        // return $this->json($type);
    }
    /**
     * @Route("/deletepost", name="admin_delete_post")
     */
    public function deletePost(Request $req, PostRepository $pRepo, GroupPostRepository $gpRepo, CommentRepository $cRepo, PostLikedRepository $lRepo, ReportRepository $rRepo): Response
    {
        $id = $req->query->get('id');
        $dlr = $rRepo->RemovePostReport($id);
        $dlgp = $gpRepo->RemovePostGroupPost($id);
        $dlc = $cRepo->RemovePostComment($id);
        $dll = $lRepo->RemovePostLiked($id);
        $dlpost = $pRepo->RemovePost($id);
        return $this->redirectToRoute('admin_page', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/report", name="report", methods={"GET"})
     */
    public function reportAction(Request $req, ReportRepository $repRe, PostRepository $postRe): Response
    {
        $rep = new Report();
        $pid = $req->query->get('id');
        $post = $postRe->find($pid);
        $rep->setPostid($post);

        $user=$this->security->getUser();

        $rep->setReporter($user);

        $repRe->add($rep,true);

        return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/like", name="likepost", methods={"GET"})
     */
    public function likeAction(Request $req, PostLikedRepository $liked, PostLikedRepository $plikeRepo): Response
    {
        $user = $this->security->getUser();
        $uid = $user->getId();
        $pid = $req->query->get('pid');
        $countline = $plikeRepo->countLike($pid);
        $like = $liked->AddPostLiked($uid, $pid);
        // return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
        return $this->json($countline);
    }
    /**
     * @Route("/unlike", name="unlikepost", methods={"GET"})
     */
    public function unLikeAction(Request $req, PostLikedRepository $liked): Response
    {
        $user = $this->security->getUser();
        $uid = $user->getId();
        $pid = $req->query->get('pid');
        $like = $liked->UnPostLiked($uid, $pid);
        return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
        // return $this->json($uid);
    }
}
