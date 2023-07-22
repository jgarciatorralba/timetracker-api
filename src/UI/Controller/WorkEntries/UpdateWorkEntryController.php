<?php

declare(strict_types=1);

namespace App\UI\Controller\WorkEntries;

use App\UI\Controller\BaseController;
use App\UI\Request\WorkEntries\UpdateWorkEntryRequest;
use App\WorkEntries\Application\Command\UpdateWorkEntry\UpdateWorkEntryCommand;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UpdateWorkEntryController extends BaseController
{
    public function __invoke(UpdateWorkEntryRequest $request): Response
    {
        $data = $request->payload();

        $endDate = null;
        if (isset($data['endDate']) && empty($data['endDate'])) {
            $endDate = (new DateTimeImmutable())->setTimestamp(0);
        } elseif (!empty($data['endDate'])) {
            $endDate = new DateTimeImmutable($data['endDate']);
        }

        $this->dispatch(new UpdateWorkEntryCommand(
            id: $data['id'],
            startDate: !empty($data['startDate']) ? new DateTimeImmutable($data['startDate']) : null,
            endDate: $endDate
        ));

        return new JsonResponse(null, Response::HTTP_OK);
    }
}
