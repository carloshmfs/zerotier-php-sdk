<?php

namespace Carloshmfs\ZeroTierSDK\Organization\Entities;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\Email;
use Carloshmfs\ZeroTierSDK\Shared\ValueObject\UUID;

class OrganizationEntity
{
    public function __construct(
        public UUID $id,
        public UUID $ownerId,
        public Email $ownerEmail
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: new UUID($data["id"]),
            ownerId: new UUID($data["ownerId"]),
            ownerEmail: new Email($data["ownerEmail"]),
        );
    }
}
