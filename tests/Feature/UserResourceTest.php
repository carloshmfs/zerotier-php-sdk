<?php

namespace Tests\Feature;

use Carloshmfs\ZeroTierSDK\User\Entities\UserEntity;
use Carloshmfs\ZeroTierSDK\User\UserResource;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UserResourceTest extends TestCase
{
    public function test_fetch_user(): void
    {
        $id = '01234567-1234-5555-0000-90909090909';

        $mockHandler = new MockHandler([
            new Response(HttpResponse::HTTP_OK, [], json_encode([
                'id' => $id,
                'orgId' => '00000000-0000-0000-0000-000000000000',
                'displayName' => 'Joe User',
                'email' => 'user@example.com',
                'smsNumber' => '+1-800-555-1212',
            ])),
        ]);

        $client = new Client(['handler' => $mockHandler]);
        $userResource = new UserResource($client, 'an awesome api token');

        $actualResponse = $userResource->fetchUserById($id);

        $this->assertInstanceOf(UserEntity::class, $actualResponse);
        $this->assertEquals($actualResponse->id, $id);
        $this->assertEquals($actualResponse->orgId, '00000000-0000-0000-0000-000000000000');
        $this->assertEquals($actualResponse->displayName, 'Joe User');
        $this->assertEquals($actualResponse->email, 'user@example.com');
        $this->assertEquals($actualResponse->smsNumber, '+1-800-555-1212');
    }
}
