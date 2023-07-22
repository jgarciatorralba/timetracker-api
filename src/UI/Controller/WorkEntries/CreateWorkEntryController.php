<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use DateTimeImmutable;
use App\Shared\Domain\ValueObject\Uuid;
use App\UI\Controller\BaseController;
use App\UI\Request\WorkEntries\CreateWorkEntryRequest;
use App\WorkEntries\Application\Command\CreateWorkEntry\CreateWorkEntryCommand;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreateWorkEntryController extends BaseController
{
    public function __invoke(CreateWorkEntryRequest $request): Response
    {
        $data = $request->payload();

        $id = Uuid::random()->value();

        $this->dispatch(new CreateWorkEntryCommand(
            id: $id,
            userId: $data['userId'],
            startDate: new DateTimeImmutable($data['startDate']),
            endDate: isset($data['endDate']) ? new DateTimeImmutable($data['endDate']) : null,
            createdAt: new DateTimeImmutable(),
            updatedAt: new DateTimeImmutable(),
            deletedAt: null
        ));

        return new JsonResponse(null, Response::HTTP_CREATED);
    }
}
