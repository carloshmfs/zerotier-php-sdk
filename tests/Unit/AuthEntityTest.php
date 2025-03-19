<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Carloshmfs\ZeroTierSDK\User\Entities\AuthEntity;

class AuthEntityTest extends TestCase
{
    public function test_can_instantiate_entiy_from_constructor(): void
    {
        $local = 'user@example.com';
        $google = '156162346876134683';
        $oidc = '00000000-0000-0000-0000-000000000000';

        $entity = new AuthEntity(
            local: $local,
            google: $google,
            oidc: $oidc
        );

        $this->assertEquals('user@example.com', $entity->local);
        $this->assertEquals('156162346876134683', $entity->google);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->oidc);
    }

    public function test_can_instantiate_entiy_from_array(): void
    {
        $local = 'user@example.com';
        $google = '156162346876134683';
        $oidc = '00000000-0000-0000-0000-000000000000';

        $entity = AuthEntity::fromArray([
            'local' => 'user@example.com',
            'google' => '156162346876134683',
            'oidc' => '00000000-0000-0000-0000-000000000000',
        ]);

        $this->assertEquals('user@example.com', $entity->local);
        $this->assertEquals('156162346876134683', $entity->google);
        $this->assertEquals('00000000-0000-0000-0000-000000000000', $entity->oidc);
    }

}
