<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $MessageReadAt;

    /**
     * @ORM\ManyToOne(targetEntity=user::class)
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity=conversation::class, inversedBy="IdConversation")
     */
    private $conversation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageReadAt(): ?\DateTimeImmutable
    {
        return $this->MessageReadAt;
    }

    public function setMessageReadAt(\DateTimeImmutable $MessageReadAt): self
    {
        $this->MessageReadAt = $MessageReadAt;

        return $this;
    }

    public function getIduser(): ?user
    {
        return $this->iduser;
    }

    public function setIduser(?user $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getConversation(): ?conversation
    {
        return $this->conversation;
    }

    public function setConversation(?conversation $conversation): self
    {
        $this->conversation = $conversation;

        return $this;
    }
}
