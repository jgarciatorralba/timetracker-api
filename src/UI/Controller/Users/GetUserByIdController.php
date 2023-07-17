<?php

declare(strict_types=1);

namespace App\UI\Controller\Users;

use App\UI\Controller\BaseController;
use App\Users\Application\Query\FindUserById\FindUserByIdQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetUserByIdController extends BaseController
{
    public function __invoke(string $id): Response
    {
        $response = $this->ask(new FindUserByIdQuery($id));

        return new JsonResponse($response->data(), Response::HTTP_OK);
    }
}
