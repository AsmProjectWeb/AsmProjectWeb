<?php

namespace App\Entity;

use App\Repository\FriendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendRepository::class)
 */
class Friend
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="User")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="FriendUser")
     */
    private $FriendUserId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getFriendUserId(): ?User
    {
        return $this->FriendUserId;
    }

    public function setFriendUserId(?User $FriendUserId): self
    {
        $this->FriendUserId = $FriendUserId;

        return $this;
    }
}
