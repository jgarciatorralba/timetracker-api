<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUsers;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Users\Domain\Service\FindUsersByCriteria;

final class FindUsersQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly FindUsersByCriteria $findUsersByCriteria
    ) {
    }

    public function __invoke(FindUsersQuery $query): FindUsersResponse
    {
        $users = $this->findUsersByCriteria->__invoke();
        $users = array_map(fn (AggregateRoot $user) => $user->toArray(), $users);

        return new FindUsersResponse($users);
    }
}
