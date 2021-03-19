<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use DateTimeInterface;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api.user.get", "api.registration", "api.user.list"})
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api.user.get", "api.registration", "api.user.list"})
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"api.user.get", "api.registration", "api.user.list"})
     */
    private ?string $name;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"api.user.get", "api.registration"})
     */
    private DateTimeInterface $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $updated_at;

    /**
     * @OneToMany(targetEntity="File", mappedBy="user")
     * @var ArrayCollection<File> $files
     */
    private ArrayCollection $files;

    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return ArrayCollection<File>
     */
    public function getFiles(): ArrayCollection
    {
        return $this->files;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
