<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use App\UI\Controller\BaseController;
use App\UI\Request\WorkEntries\GetWorkEntriesRequest;
use App\WorkEntries\Application\Query\FindWorkEntries\FindWorkEntriesQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class GetWorkEntriesController extends BaseController
{
    public function __invoke(GetWorkEntriesRequest $request): Response
    {
        $userIds = getType($request->get('userId')) === 'string'
            ? [$request->get('userId')]
            : $request->get('userId');

        $response = $this->ask(new FindWorkEntriesQuery($userIds ?? []));
        return new JsonResponse($response->data(), Response::HTTP_OK);
    }
}
