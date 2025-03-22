<?php

namespace Carloshmfs\ZeroTierSDK\Shared\ValueObject;

use Stringable;

readonly class UUID implements Stringable
{
    public string $value;

    public function __construct(string $value)
    {
        if (strlen($value) != 36) {
            throw ValueObjectException::invalidUUIDFormat();
        }

        if (!preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-5][0-9a-f]{3}-[089ab][0-9a-f]{3}-[0-9a-f]{12}$/', $value)) {
            throw ValueObjectException::invalidUUIDFormat();
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
