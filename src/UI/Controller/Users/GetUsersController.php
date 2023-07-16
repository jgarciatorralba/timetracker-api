<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\BaseController;
use App\Users\Application\Query\FindUsers\FindUsersQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetUsersController extends BaseController
{
    public function __invoke(): Response
    {
        $response = $this->ask(new FindUsersQuery);

        return new JsonResponse($response->data(), Response::HTTP_OK);
    }
}
