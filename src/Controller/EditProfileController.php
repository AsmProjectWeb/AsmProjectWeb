<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EditProfileController extends AbstractController
{
    private $security;
    private UserRepository $repo;
    public function __construct(UserRepository $repo, Security $security)
    {
      $this->repo = $repo;
      $this->security = $security;
    }

    /**
     * @Route("/edit/profile", name="app_edit_profile", requirements={"id"="\d+"})
     */
    public function index(Request $req,UserPasswordHasherInterface $userPasswordHasher, SluggerInterface $slugger,Security $security): Response
    {
        $user = null;
        $user = $this->security->getUser();
        $form = $this->createForm(ProfileType::class, $user);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

            if ($form->get("password")->getData()){
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                    )
                );
            }
            $imgFile = $form->get('image')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadAvatar($imgFile,$slugger);
                $user->setAvatar($newFilename);
            }
            $this->repo->add($user,true);
            return $this->redirectToRoute('page', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('edit_profile/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function uploadAvatar($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = $this->security->getUser()->getUserName();
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
}
