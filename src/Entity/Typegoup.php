<?php

namespace App\Entity;

use App\Repository\TypegoupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypegoupRepository::class)
 */
class Typegoup
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
    private $TypeGround;

    /**
     * @ORM\OneToMany(targetEntity=Groups::class, mappedBy="type")
     */
    private $Type;

    public function __construct()
    {
        $this->Type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeGround(): ?string
    {
        return $this->TypeGround;
    }

    public function setTypeGround(string $TypeGround): self
    {
        $this->TypeGround = $TypeGround;

        return $this;
    }

    /**
     * @return Collection<int, Groups>
     */
    public function getType(): Collection
    {
        return $this->Type;
    }

    public function addType(Groups $type): self
    {
        if (!$this->Type->contains($type)) {
            $this->Type[] = $type;
            $type->setType($this);
        }

        return $this;
    }

    public function removeType(Groups $type): self
    {
        if ($this->Type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getType() === $this) {
                $type->setType(null);
            }
        }

        return $this;
    }
}
