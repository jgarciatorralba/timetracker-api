<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntries;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Shared\Domain\ValueObject\Uuid;
use App\Users\Domain\Service\FindUsersByCriteria;
use App\WorkEntries\Domain\Service\FindWorkEntries;

final class FindWorkEntriesQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly FindUsersByCriteria $findUsersByCriteria,
        private readonly FindWorkEntries $findWorkEntries
    ) {
    }

    public function __invoke(FindWorkEntriesQuery $query): FindWorkEntriesResponse
    {
        if (!empty($userIds = array_filter($query->userIds()))) {
            $uuids = array_map(fn (string $userId) => Uuid::fromString($userId), $userIds);
            $users = $this->findUsersByCriteria->__invoke(['id' => $uuids]);

            $workEntries = [];
            foreach ($users as $user) {
                $workEntries = array_merge($workEntries, $user->workEntries()->toArray());
            }

            return new FindWorkEntriesResponse(
                array_map(
                    fn (AggregateRoot $workEntry) => $workEntry->toArray(),
                    $workEntries
                )
            );
        }

        $workEntries = $this->findWorkEntries->__invoke();
        $workEntries = array_map(fn (AggregateRoot $workEntry) => $workEntry->toArray(), $workEntries);

        return new FindWorkEntriesResponse($workEntries);
    }
}
