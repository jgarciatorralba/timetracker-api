<?php

declare(strict_types=1);

namespace TimeTracker\Shared\Domain\Bus\Query;

interface Response
{
    public function data(): array;
}