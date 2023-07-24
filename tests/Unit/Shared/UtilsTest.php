<?php

declare(strict_types=1);

namespace App\Tests\Unit\Shared;

use App\Shared\Utils;
use DateTime;
use PHPUnit\Framework\TestCase;

final class UtilsTest extends TestCase
{
    public function testDateToString(): void
    {
        $date = new DateTime();
        $dateToString = Utils::dateToString($date);

        $this->assertIsString($dateToString);
        $this->assertMatchesRegularExpression(
            '/\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1])T[0-2]\d:[0-5]\d:[0-5]\d[+-][0-2]\d:[0-5]\d/',
            $dateToString
        );
    }
}
