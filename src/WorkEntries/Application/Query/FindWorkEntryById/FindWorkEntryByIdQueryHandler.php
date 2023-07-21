<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntryById;

use App\WorkEntries\Domain\Service\FindWorkEntryById;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Shared\Domain\ValueObject\Uuid;

final class FindWorkEntryByIdQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly FindWorkEntryById $findWorkEntryById
    ) {
    }

    public function __invoke(FindWorkEntryByIdQuery $query): FindWorkEntryByIdResponse
    {
        $workEntry = $this->findWorkEntryById->__invoke(
            Uuid::fromString($query->id())
        );

        return new FindWorkEntryByIdResponse($workEntry->toArray());
    }
}
