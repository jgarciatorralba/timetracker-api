<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Exception;

use App\Shared\Domain\DomainException;
use DateTimeImmutable;

class InvalidDatesException extends DomainException
{
    public function __construct(
        private readonly DateTimeImmutable $startDate,
        private readonly DateTimeImmutable $endDate
    ) {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_dates';
    }

    public function errorMessage(): string
    {
        return sprintf(
            "End date (%s) should not be lower than start date (%s).",
            $this->endDate->format('Y-m-d H:i:s'),
            $this->startDate->format('Y-m-d H:i:s')
        );
    }
}
