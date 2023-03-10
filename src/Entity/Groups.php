<?php

namespace App\Entity;

use App\Repository\GroupsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupsRepository::class)
 */
class Groups
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $group_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="Creator")
     */
    private $createtor;

    /**
     * @ORM\OneToMany(targetEntity=GroupMembers::class, mappedBy="groupid")
     */
    private $IDgroup;

    /**
     * @ORM\OneToMany(targetEntity=GroupPost::class, mappedBy="GroupID")
     */
    private $IdGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $GroupAvatar;

    /**
     * @ORM\ManyToOne(targetEntity=Typegoup::class, inversedBy="Type")
     */
    private $type;

    public function __construct()
    {
        $this->IDgroup = new ArrayCollection();
        $this->IdGroup = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupName(): ?string
    {
        return $this->group_name;
    }

    public function setGroupName(string $group_name): self
    {
        $this->group_name = $group_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCreatetor(): ?user
    {
        return $this->createtor;
    }

    public function setCreatetor(?user $createtor): self
    {
        $this->createtor = $createtor;

        return $this;
    }

    /**
     * @return Collection<int, GroupMembers>
     */
    public function getIDgroup(): Collection
    {
        return $this->IDgroup;
    }

    public function addIDgroup(GroupMembers $iDgroup): self
    {
        if (!$this->IDgroup->contains($iDgroup)) {
            $this->IDgroup[] = $iDgroup;
            $iDgroup->setGroupid($this);
        }

        return $this;
    }

    public function removeIDgroup(Groupmembers $iDgroup): self
    {
        if ($this->IDgroup->removeElement($iDgroup)) {
            // set the owning side to null (unless already changed)
            if ($iDgroup->getGroupid() === $this) {
                $iDgroup->setGroupid(null);
            }
        }

        return $this;
    }

    public function getGroupAvatar(): ?string
    {
        return $this->GroupAvatar;
    }

    public function setGroupAvatar(?string $GroupAvatar): self
    {
        $this->GroupAvatar = $GroupAvatar;

        return $this;
    }

    public function getType(): ?Typegoup
    {
        return $this->type;
    }

    public function setType(?Typegoup $type): self
    {
        $this->type = $type;

        return $this;
    }
}
