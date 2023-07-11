<?php

declare(strict_types=1);

namespace App\UI\Subscriber;

use App\Users\Domain\Exception\UserNotFoundException;
use App\Users\Domain\Exception\WorkEntryNotFoundException;
use Symfony\Component\HttpFoundation\Response;

final class ExceptionHttpStatusCodeMapper
{
    private const EXCEPTIONS = [
        // Users
        UserNotFoundException::class => Response::HTTP_NOT_FOUND,

        // Work entries
        WorkEntryNotFoundException::class => Response::HTTP_NOT_FOUND,
    ];

    public function getStatusCodeFor(string $exceptionClass): ?int
    {
        return self::EXCEPTIONS[$exceptionClass] ?? null;
    }
}
