<?php

declare(strict_types=1);

namespace TimeTracker\Infrastructure\Api\Controller\Users;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class UsersGetController extends AbstractController
{
    #[Route(path: '/users', name: 'user_get_collection', methods: ['GET'])]
    public function getCollection(): JsonResponse
    {
        $statusCode = Response::HTTP_OK;

        return new JsonResponse(
            ['test' => 'Hello World!'],
            $statusCode
        );
    }
}