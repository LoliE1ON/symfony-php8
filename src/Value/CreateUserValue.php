<?php

namespace App\Value;

use Symfony\Component\Validator\Constraints as Assert;

class CreateUserValue
{
    public function __construct(

        #[Assert\NotNull]
        #[Assert\NotBlank]
        public string $name,

        #[Assert\NotNull]
        #[Assert\NotBlank]
        #[Assert\Email(
            message: 'The email {{ value }} is not a valid email.',
        )]
        public string $email,
    ) {}
}