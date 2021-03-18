<?php

namespace App\Service\User;

use App\Entity\User;
use App\Value\CreateUserValue;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

class UserManagerService
{
    public function __construct(
        private EntityManagerInterface $manager
    ) {}

    public function create(CreateUserValue $createUserValue): User
    {
        $user = (new User())
            ->setName($createUserValue->name)
            ->setEmail($createUserValue->email)
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());

        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}