<?php

namespace Carloshmfs\ZeroTierSDK\Shared\ValueObject;

use Exception;

class ValueObjectException extends Exception
{
    public static function invalidEmailFormat(): self
    {
        return new self("Invalid email format");
    }
}
