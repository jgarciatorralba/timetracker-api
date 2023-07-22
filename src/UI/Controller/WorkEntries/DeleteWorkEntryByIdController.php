<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use App\UI\Controller\BaseController;
use App\WorkEntries\Application\Command\DeleteWorkEntryById\DeleteWorkEntryByIdCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class DeleteWorkEntryByIdController extends BaseController
{
    public function __invoke(string $id): Response
    {
        $this->dispatch(new DeleteWorkEntryByIdCommand(id: $id));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
