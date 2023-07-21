<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use App\UI\Controller\BaseController;
use App\WorkEntries\Application\Query\FindWorkEntries\FindWorkEntriesQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetWorkEntriesController extends BaseController
{
    public function __invoke(): Response
    {
        $response = $this->ask(new FindWorkEntriesQuery());

        return new JsonResponse($response->data(), Response::HTTP_OK);
    }
}
