<?php

namespace App\Handler;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

abstract class RestHandler extends AbstractController
{
    public const ROUTE = 'api';

    protected function respond($data, array $handlerContext = [], array $headers = []): JsonResponse
    {
        if (count($handlerContext) === 0) {
            $handlerContext = [ ObjectNormalizer::GROUPS => static::ROUTE ];
        }

        $context = array_merge(
            [ ObjectNormalizer::class => true ],
            $handlerContext
        );

        return $this->json($data, 200, $headers, $context);
    }
}