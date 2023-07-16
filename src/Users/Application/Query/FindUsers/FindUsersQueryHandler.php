<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUsers;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Users\Domain\Contract\UserRepository;

final class FindUsersQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}

    public function __invoke(FindUsersQuery $query): FindUsersResponse
    {
        $users = $this->userRepository->findAll();
        $users = array_map(fn (AggregateRoot $item) => $item->toArray(), $users);
        
        return new FindUsersResponse($users);
    }
}
