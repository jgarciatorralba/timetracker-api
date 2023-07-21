<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntries;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\WorkEntries\Domain\Service\FindWorkEntries;

final class FindWorkEntriesQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly FindWorkEntries $findWorkEntries
    ) {
    }

    public function __invoke(FindWorkEntriesQuery $query): FindWorkEntriesResponse
    {
        $workEntries = $this->findWorkEntries->__invoke();
        $workEntries = array_map(fn (AggregateRoot $workEntry) => $workEntry->toArray(), $workEntries);

        return new FindWorkEntriesResponse($workEntries);
    }
}
