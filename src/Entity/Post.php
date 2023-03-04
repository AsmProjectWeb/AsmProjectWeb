<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserPost")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Post_UserID;

    /**
     * @ORM\OneToMany(targetEntity=PostLiked::class, mappedBy="post",cascade={"remove"})
     */
    private $post;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="post",cascade={"remove"})
     */
    private $IDpost;

    /**
     * @ORM\OneToMany(targetEntity=GroupPost::class, mappedBy="PostId",cascade={"remove"})
     */
    private $IdPost;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="postid",cascade={"remove"})
     */
    private $ReportPost;

    public function __construct()
    {
        $this->post = new ArrayCollection();
        $this->IDpost = new ArrayCollection();
        $this->IdPost = new ArrayCollection();
        $this->ReportPost = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image = null): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getPostUserID(): ?User
    {
        return $this->Post_UserID;
    }

    public function setPostUserID(?User $Post_UserID): self
    {
        $this->Post_UserID = $Post_UserID;

        return $this;
    }

    /**
     * @return Collection<int, PostLiked>
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(PostLiked $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post[] = $post;
            $post->setPost($this);
        }

        return $this;
    }

    public function removePost(PostLiked $post): self
    {
        if ($this->post->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getPost() === $this) {
                $post->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getIDpost(): Collection
    {
        return $this->IDpost;
    }

    public function addIDpost(Comment $iDpost): self
    {
        if (!$this->IDpost->contains($iDpost)) {
            $this->IDpost[] = $iDpost;
            $iDpost->setPost($this);
        }

        return $this;
    }

    public function removeIDpost(Comment $iDpost): self
    {
        if ($this->IDpost->removeElement($iDpost)) {
            // set the owning side to null (unless already changed)
            if ($iDpost->getPost() === $this) {
                $iDpost->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getReportPost(): Collection
    {
        return $this->ReportPost;
    }

    public function addReportPost(Report $reportPost): self
    {
        if (!$this->ReportPost->contains($reportPost)) {
            $this->ReportPost[] = $reportPost;
            $reportPost->setPostid($this);
        }

        return $this;
    }

    public function removeReportPost(Report $reportPost): self
    {
        if ($this->ReportPost->removeElement($reportPost)) {
            // set the owning side to null (unless already changed)
            if ($reportPost->getPostid() === $this) {
                $reportPost->setPostid(null);
            }
        }

        return $this;
    }
}
