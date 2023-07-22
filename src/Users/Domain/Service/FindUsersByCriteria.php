<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\Contract\UserRepository;
use App\Users\Domain\User;

final class FindUsersByCriteria
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    /** @return User[] */
    public function __invoke(array $criteria = []): array
    {
        return $this->userRepository->findByCriteria($criteria);
    }
}
