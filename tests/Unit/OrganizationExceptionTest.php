<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Organization\OrganizationException;
use PHPUnit\Framework\TestCase;

class OrganizationExceptionTest extends TestCase
{
    public function test_fetch_organization_failed(): void
    {
        // $previous = new Exception("An previous exception", 616);
        $message = 'An awesome error message';
        $code = 666;

        // $exception = OrganizationException::couldNotFetchOrganization($message, $code, $previous);
        $exception = OrganizationException::couldNotFetchOrganization($message, $code);

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
        // $this->assertInstanceOf($previous, $exception->getPrevious());
    }

    public function test_access_denied_exception(): void
    {
        $message = 'Access denied';
        $code = 403;

        $exception = OrganizationException::accessDenied();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }

    public function test_authorization_required_exception(): void
    {
        $message = 'Authorization required';
        $code = 401;

        $exception = OrganizationException::authorizationRequired();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }

    public function test_item_not_found_exception(): void
    {
        $message = 'Item not found';
        $code = 404;

        $exception = OrganizationException::notFound();

        $this->assertEquals($message, $exception->getMessage());
        $this->assertEquals($code, $exception->getCode());
    }
}
