<?php

declare(strict_types=1);

namespace TimeTracker\Shared\Infrastructure\Bus\Exception;

use TimeTracker\Shared\Domain\Bus\Query\Query;

class QueryNotRegisteredException extends \Exception
{
    public function __construct(Query $query)
    {
        $message = sprintf(
            'Query with class %s has no handler registered',
            $query::class
        );

        parent::__construct($message);
    }
}
