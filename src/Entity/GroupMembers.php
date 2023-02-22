<?php

namespace App\Entity;

use App\Repository\GroupMembersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupMembersRepository::class)
 */
class GroupMembers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rolemember;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="user")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=groups::class, inversedBy="IDgroup")
     */
    private $groupid;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRolemember(): ?int
    {
        return $this->rolemember;
    }

    public function setRolemember(int $rolemember): self
    {
        $this->rolemember = $rolemember;

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

    public function getGroupid(): ?groups
    {
        return $this->groupid;
    }

    public function setGroupid(?groups $groupid): self
    {
        $this->groupid = $groupid;

        return $this;
    }

}
