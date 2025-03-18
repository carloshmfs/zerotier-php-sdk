<?php

namespace Carloshmfs\ZeroTierSDK\User;

use Exception;

class UserException extends Exception
{
    public static function fetchUserFailed(string $message, int $code): self
    {
        return new self($message, $code);
    }

    public static function authorizationRequired(): self
    {
        return new self('Authorization required', 401);
    }

    public static function accessDenied(): self
    {
        return new self('Access denied', 403);
    }

    public static function itemNotFound(): self
    {
        return new self('Item not found', 404);
    }
}
