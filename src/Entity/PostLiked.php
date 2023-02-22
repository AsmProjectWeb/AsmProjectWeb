<?php

namespace App\Entity;

use App\Repository\PostLikedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostLikedRepository::class)
 */
class PostLiked
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isliked;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="postuser")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="post")
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): self
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function isIsliked(): ?bool
    {
        return $this->isliked;
    }

    public function setIsliked(bool $isliked): self
    {
        $this->isliked = $isliked;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPost(): ?post
    {
        return $this->post;
    }

    public function setPost(?post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
