<?php

declare(strict_types=1);

namespace App\Users\Domain\Exception;

use App\Shared\Domain\DomainException;

class EmailAlreadyInUseException extends DomainException
{
    public function __construct(private readonly string $email)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'email_already_in_use';
    }

    public function errorMessage(): string
    {
        return sprintf(
            "Email '%s' is already in use.",
            $this->email
        );
    }
}
