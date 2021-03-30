<?php

namespace App\Service\User;

use App\Entity\User;
use App\Service\AbstractService;
use App\Value\CreateUserValue;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;

class UserManagerService extends AbstractService
{
    public function __construct(
        private EntityManagerInterface $manager
    ) {}

    public function create(CreateUserValue $createUserValue): User
    {
        $this->validate($createUserValue);

        $user = (new User())
            ->setName($createUserValue->getName())
            ->setEmail($createUserValue->getEmail())
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());

        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }
}