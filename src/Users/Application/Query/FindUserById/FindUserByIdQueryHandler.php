<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUserById;

use App\Users\Domain\Service\FindUserById;
use App\Shared\Domain\Bus\Query\QueryHandler;
use App\Shared\Domain\ValueObject\Uuid;

final class FindUserByIdQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly FindUserById $findUserById
    ) {
    }

    public function __invoke(FindUserByIdQuery $query): FindUserByIdResponse
    {
        $user = $this->findUserById->__invoke(
            Uuid::fromString($query->id())
        );

        return new FindUserByIdResponse($user->toArray());
    }
}
