<?php

declare(strict_types=1);

namespace TimeTracker\Shared\Domain;

use Exception;

abstract class DomainException extends Exception
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;

    abstract public function errorMessage(): string;
}
