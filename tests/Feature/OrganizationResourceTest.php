<?php

namespace Tests\Feature;

use Carloshmfs\ZeroTierSDK\Organization\Entities\OrganizationEntity;
use Carloshmfs\ZeroTierSDK\Organization\OrganizationResource;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class OrganizationResourceTest extends TestCase
{
    public function test_fetch_current_org(): void
    {
        $mockHandler = new MockHandler([
            new Response(HttpResponse::HTTP_OK, [], json_encode([
                'id' => '00000000-0000-0000-0000-000000000000',
                'ownerId' => '00000000-0000-0000-0000-000000000000',
                'ownerEmail' => 'user@example.com',
            ])),
        ]);

        $client = new Client(['handler' => $mockHandler]);
        $userResource = new OrganizationResource($client, 'an awesome api token');

        $actualResponse = $userResource->current();

        $this->assertInstanceOf(OrganizationEntity::class, $actualResponse);
        $this->assertEquals($actualResponse->id, '00000000-0000-0000-0000-000000000000');
        $this->assertEquals($actualResponse->ownerId, '00000000-0000-0000-0000-000000000000');
        $this->assertEquals($actualResponse->ownerEmail, 'user@example.com');
    }
}
