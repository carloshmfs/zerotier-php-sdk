<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\ValueObjectException;
use PHPUnit\Framework\TestCase;

class ValueObjectExceptionTest extends TestCase
{
    public function test_invalid_email_format(): void
    {
        $message = 'Invalid email format';

        $exception = ValueObjectException::invalidEmailFormat();

        $this->assertEquals($message, $exception->getMessage());
    }
}
