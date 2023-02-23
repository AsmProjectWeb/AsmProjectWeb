<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\LoginType;
use App\Form\PostType;
use App\Form\RegisterType;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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

    private PostRepository $repo;
    public function __construct(PostRepository $repo)
    {
      $this->repo = $repo;
    }

    /**
     * @Route("/page", name="page")
     */
    public function page(Request $req, SluggerInterface $slugger): Response
    {
        $p = new Post();
        $form = $this -> createForm(PostType::class, $p);

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
        return $this->render("homepage.html.twig",[
            'form' => $form->createView()
        ]);
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
     * @Route("/profile", name="profile", methods={"POST"})
     */
    public function profile(Request $repo): Response
    {
        $id = $repo->request->get('id');
        return $this->render('profile.html.twig', ['id'=>$id]);
    }
    /**
     * @Route("/group", name="profile_group")
     */
    public function FunctionName(): Response
    {
        return $this->render('groupProfile.html.twig', []);
    }
}
