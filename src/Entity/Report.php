<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=post::class, inversedBy="ReportPost")
     */
    private $postid;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="Reporter")
     */
    private $Reporter;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $SendAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostid(): ?post
    {
        return $this->postid;
    }

    public function setPostid(?post $postid): self
    {
        $this->postid = $postid;

        return $this;
    }

    public function getReporter(): ?user
    {
        return $this->Reporter;
    }

    public function setReporter(?user $Reporter): self
    {
        $this->Reporter = $Reporter;

        return $this;
    }

    public function getSendAt(): ?\DateTimeImmutable
    {
        return $this->SendAt;
    }

    public function setSendAt(\DateTimeImmutable $SendAt): self
    {
        $this->SendAt = $SendAt;

        return $this;
    }
}
