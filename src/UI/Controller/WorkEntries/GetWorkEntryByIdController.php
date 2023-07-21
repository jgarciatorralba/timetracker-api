<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use App\UI\Controller\BaseController;
use App\WorkEntries\Application\Query\FindWorkEntryById\FindWorkEntryByIdQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetWorkEntryByIdController extends BaseController
{
    public function __invoke(string $id): Response
    {
        $response = $this->ask(new FindWorkEntryByIdQuery($id));

        return new JsonResponse($response->data(), Response::HTTP_OK);
    }
}
