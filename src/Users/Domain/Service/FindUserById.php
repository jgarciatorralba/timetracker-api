<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\User;
use App\Users\Domain\Contract\UserRepository;
use App\Shared\Domain\ValueObject\Uuid;
use App\Users\Domain\Exception\UserNotFoundException;

final class FindUserById
{
    public function __construct(
       private readonly UserRepository $userRepository
    ) {}

    public function __invoke(Uuid $id): User
    {
        $user = $this->userRepository->findOneById($id);
        if ($user === null) {
            throw new UserNotFoundException($id);
        }

        return $user;
    }
}
