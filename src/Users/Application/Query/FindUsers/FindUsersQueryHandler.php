<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUsers;

use App\Shared\Domain\Bus\Query\QueryHandler;

final class FindUsersQueryHandler implements QueryHandler
{
    public function __construct() {}

    public function __invoke(FindUsersQuery $query): FindUsersResponse
    {
        $users = [
            [
                'id' => 1,
                'name' => 'First user name'
            ],
            [
                'id' => 2,
                'name' => 'Second user name'
            ]
        ];
        
        return new FindUsersResponse($users);
    }
}
