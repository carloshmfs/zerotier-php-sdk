<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\Email;
use Carloshmfs\ZeroTierSDK\User\Entities\AuthEntity;
use Carloshmfs\ZeroTierSDK\User\Entities\UserEntity;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function test_can_instantiate_entiy_from_constructor(): void
    {
        $auth = new AuthEntity(
            local: 'user@example.com',
            google: '156162346876134683',
            oidc: '00000000-0000-0000-0000-000000000000'
        );

        $id = '00000000-0000-0000-0000-000000000000';
        $orgId = '00000000-0000-0000-0000-000000000000';
        $displayName = 'Joe User';
        $email = 'user@example.com';
        $smsNumber = '1-800-555-1212';
        $tokens = [
            'my-token-id',
            'my-token-id2',
            'my-token-id3',
        ];

        $entity = new UserEntity(
            $id,
            $orgId,
            $displayName,
            new Email($email),
            $auth,
            $smsNumber,
            $tokens
        );

        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->id);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->orgId);
        $this->assertEquals('Joe User', $entity->displayName);
        $this->assertEquals('user@example.com', $entity->email);
        $this->assertInstanceOf(AuthEntity::class, $entity->auth);
        $this->assertEquals('1-800-555-1212', $entity->smsNumber);
        $this->assertEquals([
            'my-token-id',
            'my-token-id2',
            'my-token-id3',
        ], $entity->tokens);
    }

    public function test_can_instantiate_entiy_from_array(): void
    {
        $entity = UserEntity::fromArray([
            'id' => '00000000-0000-0000-0000-000000000000',
            'orgId' => '00000000-0000-0000-0000-000000000000',
            'displayName' => 'Joe User',
            'email' => 'user@example.com',
            'auth' => [
                'local' => 'user@example.com',
                'google' => '156162346876134683',
                'oidc' => '00000000-0000-0000-0000-000000000000',
            ],
            'smsNumber' => '1-800-555-1212',
            'tokens' => [
                'my-token-id',
                'my-token-id2',
                'my-token-id3',
            ],
        ]);

        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->id);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->orgId);
        $this->assertEquals('Joe User', $entity->displayName);
        $this->assertEquals('user@example.com', $entity->email);
        $this->assertInstanceOf(AuthEntity::class, $entity->auth);
        $this->assertEquals('1-800-555-1212', $entity->smsNumber);

    }
}
