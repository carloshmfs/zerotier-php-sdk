<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\User\UserException;
use PHPUnit\Framework\TestCase;

class UserExceptionTest extends TestCase
{
    public function test_fetch_user_failed(): void
    {
        $message = 'An awesome error message';
        $code = 666;

        $exception = UserException::fetchUserFailed($message, $code);

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }

    public function test_access_denied_exception(): void
    {
        $message = 'Access denied';
        $code = 403;

        $exception = UserException::accessDenied();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }

    public function test_authorization_required_exception(): void
    {
        $message = 'Authorization required';
        $code = 401;

        $exception = UserException::authorizationRequired();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }

    public function test_item_not_found_exception(): void
    {
        $message = 'Item not found';
        $code = 404;

        $exception = UserException::itemNotFound();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }
}
