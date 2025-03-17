<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\User\Entities\UserEntity;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function test_can_instantiate_entiy_from_constructor(): void
    {
        $id = '00000000-0000-0000-0000-000000000000';
        $orgId = '00000000-0000-0000-0000-000000000000';
        $displayName = 'Joe User';
        $email = 'user@example.com';
        $smsNumber = '1-800-555-1212';

        $entity = new UserEntity(
            $id,
            $orgId,
            $displayName,
            $email,
            $smsNumber
        );

        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->id);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->orgId);
        $this->assertEquals('Joe User', $entity->displayName);
        $this->assertEquals('user@example.com', $entity->email);
        $this->assertEquals('1-800-555-1212', $entity->smsNumber);
    }

    public function test_can_instantiate_entiy_from_array(): void
    {
        $entity = UserEntity::fromArray([
            'id' => '00000000-0000-0000-0000-000000000000',
            'orgId' => '00000000-0000-0000-0000-000000000000',
            'displayName' => 'Joe User',
            'email' => 'user@example.com',
            'smsNumber' => '1-800-555-1212',
        ]);

        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->id);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->orgId);
        $this->assertEquals('Joe User', $entity->displayName);
        $this->assertEquals('user@example.com', $entity->email);
        $this->assertEquals('1-800-555-1212', $entity->smsNumber);

    }
}
