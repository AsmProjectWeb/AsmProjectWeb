<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConversationRepository::class)
 */
class Conversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Participant::class, mappedBy="conversation")
     */
    private $IdConversation;

    /**
     * @ORM\ManyToOne(targetEntity=Mess::class, inversedBy="LastMess")
     */
    private $LastMessage;

    /**
     * @ORM\OneToMany(targetEntity=Mess::class, mappedBy="conversation")
     */
    private $conversation;

    public function __construct()
    {
        $this->IdConversation = new ArrayCollection();
        $this->conversation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Participant>
     */
    public function getIdConversation(): Collection
    {
        return $this->IdConversation;
    }

    public function addIdConversation(Participant $idConversation): self
    {
        if (!$this->IdConversation->contains($idConversation)) {
            $this->IdConversation[] = $idConversation;
            $idConversation->setConversation($this);
        }

        return $this;
    }

    public function removeIdConversation(Participant $idConversation): self
    {
        if ($this->IdConversation->removeElement($idConversation)) {
            // set the owning side to null (unless already changed)
            if ($idConversation->getConversation() === $this) {
                $idConversation->setConversation(null);
            }
        }

        return $this;
    }

    public function getLastMessage(): ?Mess
    {
        return $this->LastMessage;
    }

    public function setLastMessage(?Mess $LastMessage): self
    {
        $this->LastMessage = $LastMessage;

        return $this;
    }

    /**
     * @return Collection<int, Mess>
     */
    public function getConversation(): Collection
    {
        return $this->conversation;
    }

    public function addConversation(Mess $conversation): self
    {
        if (!$this->conversation->contains($conversation)) {
            $this->conversation[] = $conversation;
            $conversation->setConversation($this);
        }

        return $this;
    }

    public function removeConversation(Mess $conversation): self
    {
        if ($this->conversation->removeElement($conversation)) {
            // set the owning side to null (unless already changed)
            if ($conversation->getConversation() === $this) {
                $conversation->setConversation(null);
            }
        }

        return $this;
    }
}
