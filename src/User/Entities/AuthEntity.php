<?php

namespace Carloshmfs\ZeroTierSDK\User\Entities;

readonly class AuthEntity
{
    public function __construct(
        public string $local,
        public string $google,
        public string $oidc
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            local: $data['local'],
            google: $data['google'],
            oidc: $data['oidc'],
        );
    }
}
