<?php

namespace App\Controller;

use App\Exception\ValidationFailedException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Validator\ConstraintViolationListInterface;

abstract class AbstractRestController extends AbstractController
{
    public const ROUTE = null;

    protected function respond(mixed $data, array $controllerContext = [], array $headers = []): JsonResponse
    {
        $context = array_merge(
            [ObjectNormalizer::class => true],
            !!$controllerContext ? $controllerContext : [ObjectNormalizer::GROUPS => static::ROUTE]
        );

        return $this->json($data, Response::HTTP_OK, $headers, $context);
    }

    protected function validate(ConstraintViolationListInterface $constraintViolationList): void
    {
        if (!!$constraintViolationList->count()) {
            throw ValidationFailedException::forErrors($constraintViolationList);
        }
    }
}