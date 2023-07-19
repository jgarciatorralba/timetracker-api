<?php

declare(strict_types=1);

namespace App\Users\Domain\Service;

use App\Users\Domain\User;
use App\Users\Domain\Contract\UserRepository;

final class DeleteUser
{
    public function __construct(
       private readonly UserRepository $userRepository
    ) {}

    public function __invoke(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
