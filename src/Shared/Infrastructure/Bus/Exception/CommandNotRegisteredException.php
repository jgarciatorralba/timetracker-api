<?php

declare(strict_types=1);

namespace TimeTracker\Shared\Infrastructure\Bus\Exception;

use TimeTracker\Shared\Domain\Bus\Command\Command;

class CommandNotRegisteredException extends \Exception
{
    public function __construct(Command $command)
    {
        $message = sprintf(
            'Command with class %s has no handler registered',
            $command::class
        );

        parent::__construct($message);
    }
}
