<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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
}