<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\UUID;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\ValueObjectException;
use PHPUnit\Framework\TestCase;

class UUIDValueObjectTest extends TestCase
{
    public function test_can_instatiate_from_constructor(): void
    {
        $uuid = new UUID("123e4567-e89b-12d3-a456-426614174000");
        $this->assertEquals("123e4567-e89b-12d3-a456-426614174000", (string)$uuid);
    }

    public function test_wrong_email_format(): void
    {
        $this->expectException(ValueObjectException::class);
        new UUID("0000000000009999999999999999");
    }
}
