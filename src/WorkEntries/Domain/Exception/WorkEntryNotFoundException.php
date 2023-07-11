<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Exception;

use App\Shared\Domain\DomainException;
use App\Shared\Domain\ValueObject\Uuid;

class WorkEntryNotFoundException extends DomainException
{
    public function __construct(private readonly Uuid $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'work_entry_not_found';
    }

    public function errorMessage(): string
    {
        return sprintf(
            'Work entry with id "%s" could not be found.',
            $this->id->value()
        );
    }
}
