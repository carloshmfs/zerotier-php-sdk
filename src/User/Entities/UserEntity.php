<?php

namespace Carloshmfs\ZeroTierSDK\User\Entities;

use Carloshmfs\ZeroTierSDK\Shared\ValueObject\Email;

readonly class UserEntity
{
    public function __construct(
        public string $id,
        public string $orgId,
        public string $displayName,
        public Email $email,
        public AuthEntity $auth,
        public string $smsNumber,
        public array $tokens
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            orgId: $data['orgId'],
            displayName: $data['displayName'],
            email: new Email($data['email']),
            auth: AuthEntity::fromArray($data['auth']),
            smsNumber: $data['smsNumber'],
            tokens: $data['tokens']
        );
    }
}
