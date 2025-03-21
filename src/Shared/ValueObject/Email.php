<?php

namespace Carloshmfs\ZeroTierSDK\Shared\ValueObject;

use Stringable;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\ValueObjectException;

readonly class Email implements Stringable
{
    public string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw ValueObjectException::invalidEmailFormat();
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
