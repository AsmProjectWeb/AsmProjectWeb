<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hometown;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="Post_UserID", orphanRemoval=true)
     */
    private $UserPost;

    /**
     * @ORM\OneToMany(targetEntity=GroupMembers::class, mappedBy="user")
     */
    private $friend;

    /**
     * @ORM\OneToMany(targetEntity=Groups::class, mappedBy="createtor")
     */
    private $Creator;

    /**
     * @ORM\OneToMany(targetEntity=PostLiked::class, mappedBy="user")
     */
    private $postuser;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="user")
     */
    private $IDuser;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user")
     */
    private $UserComment;

    /**
     * @ORM\OneToMany(targetEntity=Mess::class, mappedBy="user")
     */
    private $IdUser;

    /**
     * @ORM\OneToMany(targetEntity=Friend::class, mappedBy="userId")
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity=Friend::class, mappedBy="FriendUserId")
     */
    private $FriendUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity=FriendRequest::class, mappedBy="Sender")
     */
    private $sender;

    /**
     * @ORM\OneToMany(targetEntity=FriendRequest::class, mappedBy="receiver")
     */
    private $receiver;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="Reporter")
     */
    private $Reporter;

    public function __construct()
    {
        $this->UserPost = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->Creator = new ArrayCollection();
        $this->userbeforeshare = new ArrayCollection();
        $this->postuser = new ArrayCollection();
        $this->IDuser = new ArrayCollection();
        $this->UserComment = new ArrayCollection();
        $this->IdUser = new ArrayCollection();
        $this->User = new ArrayCollection();
        $this->FriendUser = new ArrayCollection();
        $this->sender = new ArrayCollection();
        $this->receiver = new ArrayCollection();
        $this->Reporter = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getHometown(): ?string
    {
        return $this->hometown;
    }

    public function setHometown(?string $hometown): self
    {
        $this->hometown = $hometown;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getUserPost(): Collection
    {
        return $this->UserPost;
    }

    public function addUserPost(Post $userPost): self
    {
        if (!$this->UserPost->contains($userPost)) {
            $this->UserPost[] = $userPost;
            $userPost->setPostUserID($this);
        }

        return $this;
    }

    public function removeUserPost(Post $userPost): self
    {
        if ($this->UserPost->removeElement($userPost)) {
            // set the owning side to null (unless already changed)
            if ($userPost->getPostUserID() === $this) {
                $userPost->setPostUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GroupMembers>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(GroupMembers $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setUser($this);
        }

        return $this;
    }

    public function removeUser(GroupMembers $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUser() === $this) {
                $user->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Groups>
     */
    public function getCreator(): Collection
    {
        return $this->Creator;
    }

    public function addCreator(Groups $creator): self
    {
        if (!$this->Creator->contains($creator)) {
            $this->Creator[] = $creator;
            $creator->setCreatetor($this);
        }

        return $this;
    }

    public function removeCreator(Groups $creator): self
    {
        if ($this->Creator->removeElement($creator)) {
            // set the owning side to null (unless already changed)
            if ($creator->getCreatetor() === $this) {
                $creator->setCreatetor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getUserbeforeshare(): Collection
    {
        return $this->userbeforeshare;
    }

    /**
     * @return Collection<int, PostLiked>
     */
    public function getPostuser(): Collection
    {
        return $this->postuser;
    }

    public function addPostuser(PostLiked $postuser): self
    {
        if (!$this->postuser->contains($postuser)) {
            $this->postuser[] = $postuser;
            $postuser->setUser($this);
        }

        return $this;
    }

    public function removePostuser(PostLiked $postuser): self
    {
        if ($this->postuser->removeElement($postuser)) {
            // set the owning side to null (unless already changed)
            if ($postuser->getUser() === $this) {
                $postuser->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getIDuser(): Collection
    {
        return $this->IDuser;
    }

    public function addIDuser(Post $iDuser): self
    {
        if (!$this->IDuser->contains($iDuser)) {
            $this->IDuser[] = $iDuser;
            $iDuser->setPostUserID($this);
        }

        return $this;
    }

    public function removeIDuser(Post $iDuser): self
    {
        if ($this->IDuser->removeElement($iDuser)) {
            // set the owning side to null (unless already changed)
            if ($iDuser->getPostUserID() === $this) {
                $iDuser->setPostUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getUserComment(): Collection
    {
        return $this->UserComment;
    }

    public function addUserComment(Comment $userComment): self
    {
        if (!$this->UserComment->contains($userComment)) {
            $this->UserComment[] = $userComment;
            $userComment->setUser($this);
        }

        return $this;
    }

    public function removeUserComment(Comment $userComment): self
    {
        if ($this->UserComment->removeElement($userComment)) {
            // set the owning side to null (unless already changed)
            if ($userComment->getUser() === $this) {
                $userComment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Friend>
     */
    public function getFriendUser(): Collection
    {
        return $this->FriendUser;
    }

    public function addFriendUser(Friend $friendUser): self
    {
        if (!$this->FriendUser->contains($friendUser)) {
            $this->FriendUser[] = $friendUser;
            $friendUser->setFriendUserId($this);
        }

        return $this;
    }

    public function removeFriendUser(Friend $friendUser): self
    {
        if ($this->FriendUser->removeElement($friendUser)) {
            // set the owning side to null (unless already changed)
            if ($friendUser->getFriendUserId() === $this) {
                $friendUser->setFriendUserId(null);
            }
        }

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Collection<int, FriendRequest>
     */
    public function getSender(): Collection
    {
        return $this->sender;
    }

    public function addSender(FriendRequest $sender): self
    {
        if (!$this->sender->contains($sender)) {
            $this->sender[] = $sender;
            $sender->setSender($this);
        }

        return $this;
    }

    public function removeSender(FriendRequest $sender): self
    {
        if ($this->sender->removeElement($sender)) {
            // set the owning side to null (unless already changed)
            if ($sender->getSender() === $this) {
                $sender->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FriendRequest>
     */
    public function getReceiver(): Collection
    {
        return $this->receiver;
    }

    public function addReceiver(FriendRequest $receiver): self
    {
        if (!$this->receiver->contains($receiver)) {
            $this->receiver[] = $receiver;
            $receiver->setReceiver($this);
        }

        return $this;
    }

    public function removeReceiver(FriendRequest $receiver): self
    {
        if ($this->receiver->removeElement($receiver)) {
            // set the owning side to null (unless already changed)
            if ($receiver->getReceiver() === $this) {
                $receiver->setReceiver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getReporter(): Collection
    {
        return $this->Reporter;
    }

    public function addReporter(Report $reporter): self
    {
        if (!$this->Reporter->contains($reporter)) {
            $this->Reporter[] = $reporter;
            $reporter->setReporter($this);
        }

        return $this;
    }

    public function removeReporter(Report $reporter): self
    {
        if ($this->Reporter->removeElement($reporter)) {
            // set the owning side to null (unless already changed)
            if ($reporter->getReporter() === $this) {
                $reporter->setReporter(null);
            }
        }

        return $this;
    }
}
