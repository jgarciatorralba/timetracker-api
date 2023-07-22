<?php

declare(strict_types=1);

namespace App\UI\Subscriber;

use App\Users\Domain\Exception\EmailAlreadyInUseException;
use App\Users\Domain\Exception\UserNotFoundException;
use App\WorkEntries\Domain\Exception\WorkEntryNotFoundException;
use App\WorkEntries\Domain\Exception\InvalidDatesException;
use Symfony\Component\HttpFoundation\Response;

final class ExceptionHttpStatusCodeMapper
{
    private const EXCEPTIONS = [
        // Users
        UserNotFoundException::class => Response::HTTP_NOT_FOUND,
        EmailAlreadyInUseException::class => Response::HTTP_CONFLICT,

        // Work entries
        WorkEntryNotFoundException::class => Response::HTTP_NOT_FOUND,
        InvalidDatesException::class => Response::HTTP_CONFLICT
    ];

    public function getStatusCodeFor(string $exceptionClass): ?int
    {
        return self::EXCEPTIONS[$exceptionClass] ?? null;
    }
}
