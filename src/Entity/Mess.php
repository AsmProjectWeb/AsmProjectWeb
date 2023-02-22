<?php

namespace App\Entity;

use App\Repository\MessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessRepository::class)
 */
class Mess
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @ORM\OneToMany(targetEntity=Conversation::class, mappedBy="LastMessage")
     */
    private $LastMess;

    /**
     * @ORM\ManyToOne(targetEntity=conversation::class, inversedBy="conversation")
     */
    private $conversation;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="IdUser")
     */
    private $user;

    public function __construct()
    {
        $this->LastMess = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @return Collection<int, Conversation>
     */
    public function getLastMess(): Collection
    {
        return $this->LastMess;
    }

    public function addLastMess(Conversation $lastMess): self
    {
        if (!$this->LastMess->contains($lastMess)) {
            $this->LastMess[] = $lastMess;
            $lastMess->setLastMessage($this);
        }

        return $this;
    }

    public function removeLastMess(Conversation $lastMess): self
    {
        if ($this->LastMess->removeElement($lastMess)) {
            // set the owning side to null (unless already changed)
            if ($lastMess->getLastMessage() === $this) {
                $lastMess->setLastMessage(null);
            }
        }

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

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
}
