<?php

namespace Carloshmfs\ZeroTierSDK\Organization;

use Exception;
use Throwable;

class OrganizationException extends Exception
{
    public static function authorizationRequired(): self
    {
        return new self("Authorization required", 401);
    }

    public static function accessDenied(): self
    {
        return new self("Access denied", 403);
    }

    public static function notFound(): self
    {
        return new self("Item not found", 404);
    }

    public static function couldNotFetchOrganization(string $message, int $code, ?Throwable $previous = null): self
    {
        return new self($message, $code, $previous);
    }
}
