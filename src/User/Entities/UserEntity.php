<?php

namespace Carloshmfs\ZeroTierSDK\User\Entities;

readonly class UserEntity
{
    public function __construct(
        public string $id,
        public string $orgId,
        public string $displayName,
        public string $email,
        public AuthEntity $auth,
        public string $smsNumber
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            orgId: $data['orgId'],
            displayName: $data['displayName'],
            email: $data['email'],
            auth: AuthEntity::fromArray($data['auth']),
            smsNumber: $data['smsNumber']
        );
    }
}
