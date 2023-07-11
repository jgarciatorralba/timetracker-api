<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\ApiController;
use App\Users\Application\Query\FindUsers\FindUsersQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class UsersGetController extends ApiController
{
    #[Route(path: '/users', name: 'user_get_collection', methods: ['GET'])]
    public function getCollection(): Response
    {
        $statusCode = Response::HTTP_OK;
        $response = $this->ask(new FindUsersQuery);

        return new JsonResponse($response->data(), $statusCode);
    }
}