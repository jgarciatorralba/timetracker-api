<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\ApiController;
use App\Users\Application\Query\FindUsers\FindUsersQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetUsersController extends ApiController
{
    public function __invoke(): Response
    {
        $statusCode = Response::HTTP_OK;
        $response = $this->ask(new FindUsersQuery);

        return new JsonResponse($response->data(), $statusCode);
    }
}
