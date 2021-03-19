<?php

namespace App\Value;

use Symfony\Component\Validator\Constraints as Assert;

class CreateUserValue
{
    #[Assert\NotNull]
    #[Assert\NotBlank]
    private ?string $name;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    private ?string $email;

    public function __construct(?string $name, ?string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}