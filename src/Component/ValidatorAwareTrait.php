<?php
declare(strict_types=1);

namespace App\Component;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Exception\ObjectValidationException;

trait ValidatorAwareTrait
{
    private ValidatorInterface $validator;

    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    protected function validate(object $object, mixed $groups = null): void
    {
        $errors = $this->validator->validate($object, null, $groups);

        if ($errors->count()) {
            throw ObjectValidationException::forContext($errors);
        }
    }
}