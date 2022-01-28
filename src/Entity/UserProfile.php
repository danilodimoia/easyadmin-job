<?php

namespace App\Entity;

use App\Repository\UserProfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserProfileRepository::class)
 */
class UserProfile
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="profile", cascade={"persist", "remove"})
     */
    private $userr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUserr(): ?User
    {
        return $this->userr;
    }

    public function setUserr(User $userr): self
    {
        // set the owning side of the relation if necessary
        if ($userr->getProfile() !== $this) {
            $userr->setProfile($this);
        }

        $this->userr = $userr;

        return $this;
    }
}
