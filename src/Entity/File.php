<?php

namespace App\Entity;

use App\Repository\FileRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FileRepository::class)
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api.file.list", "api.file.get"})
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api.file.list", "api.file.get"})
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api.file.list", "api.file.get"})
     */
    private string $mime_type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api.file.list", "api.file.get"})
     */
    private string $extension;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api.file.list", "api.file.get"})
     */
    private string $type;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"api.file.list", "api.file.get"})
     */
    private DateTimeInterface $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"api.file.list", "api.file.get"})
     */
    private DateTimeInterface $updated_at;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="files")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private User $user;

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

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    public function setMimeType(string $mime_type): self
    {
        $this->mime_type = $mime_type;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
