<?php

declare(strict_types=1);

namespace TimeTracker\Controller\Users;

use App\Users\Application\Query\FindUsers\FindUsersQuery;
use TimeTracker\Controller\ApiController;
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