<?php

namespace App\Entity;

use App\Repository\FriendRequestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendRequestRepository::class)
 */
class FriendRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="sender")
     */
    private $Sender;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="receiver")
     */
    private $receiver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?user
    {
        return $this->Sender;
    }

    public function setSender(?user $Sender): self
    {
        $this->Sender = $Sender;

        return $this;
    }

    public function getReceiver(): ?user
    {
        return $this->receiver;
    }

    public function setReceiver(?user $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }
}
