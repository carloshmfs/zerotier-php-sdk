<?php

namespace Tests\Unit;

use Carloshmfs\ZeroTierSDK\Organization\Entities\OrganizationEntity;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\UUID;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\Email;
use PHPUnit\Framework\TestCase;

class OrganizationEntityTest extends TestCase
{
    public function test_can_instantiate_entiy_from_constructor(): void
    {
        $orgId = "8437a76c-824d-48b6-b6fa-fc7b961f4d7a";
        $ownerId = "1cc3f0ad-ca97-4038-b5c8-362f9fbf177e";

        $entity = new OrganizationEntity(
            id: new UUID($orgId),
            ownerId: new UUID($ownerId),
            ownerEmail: new Email("test@email.com")
        );

        $this->assertEquals($orgId, (string)$entity->id);
        $this->assertEquals($ownerId, (string)$entity->ownerId);
        $this->assertEquals("test@email.com", (string)$entity->ownerEmail);
    }

    public function test_can_instantiate_entiy_from_array(): void
    {
        $orgId = "8437a76c-824d-48b6-b6fa-fc7b961f4d7a";
        $ownerId = "1cc3f0ad-ca97-4038-b5c8-362f9fbf177e";

        $entity = OrganizationEntity::fromArray([
            "id" => $orgId,
            "ownerId" => $ownerId,
            "ownerEmail" => "test@email.com",
        ]);

        $this->assertEquals($orgId, (string)$entity->id);
        $this->assertEquals($ownerId, (string)$entity->ownerId);
        $this->assertEquals("test@email.com", (string)$entity->ownerEmail);
    }
}
