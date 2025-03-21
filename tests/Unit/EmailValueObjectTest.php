<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\Email;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\ValueObjectException;
use PHPUnit\Framework\TestCase;

class EmailValueObjectTest extends TestCase
{
    public function test_can_instatiate_from_constructor(): void
    {
        $email = new Email("test@email.com");

        $this->assertEquals("test@email.com", (string)$email);
    }

    public function test_wrong_email_format(): void
    {
        $this->expectException(ValueObjectException::class);

        $email = new Email("a string thats not an email");
    }
}
