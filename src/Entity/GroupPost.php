<?php

namespace App\Entity;

use App\Repository\GroupPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupPostRepository::class)
 */
class GroupPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="IdPost")
     */
    private $PostId;

    /**
     * @ORM\ManyToOne(targetEntity=Groups::class, inversedBy="IdGroup")
     */
    private $GroupID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostId(): ?Post
    {
        return $this->PostId;
    }

    public function setPostId(?Post $PostId): self
    {
        $this->PostId = $PostId;

        return $this;
    }

    public function getGroupID(): ?Groups
    {
        return $this->GroupID;
    }

    public function setGroupID(?Groups $GroupID): self
    {
        $this->GroupID = $GroupID;

        return $this;
    }
}
