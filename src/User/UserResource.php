<?php

namespace Carloshmfs\ZeroTierSDK\User;

use Carloshmfs\ZeroTierSDK\User\Entities\UserEntity;
use Carloshmfs\ZeroTierSDK\User\UserException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

readonly class UserResource
{
    private const URI = 'https://api.zerotier.com/api/v1/network/user';

    public function __construct(
        private Client $client,
        private string $apiToken
    ) {
    }

    public function fetchUserById(string $id): UserEntity
    {
        try {
            $response = $this->client->get(self::URI . '/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiToken,
                ],
            ]);
        } catch (GuzzleException $e) {
            match ($e->getCode()) {
                Response::HTTP_UNAUTHORIZED => throw UserException::authorizationRequired(),
                Response::HTTP_FORBIDDEN => throw UserException::accessDenied(),
                Response::HTTP_NOT_FOUND => throw UserException::itemNotFound(),
                default => throw UserException::fetchUserFailed($e->getMessage(), $e->getCode()),
            };
        }

        $responsePayload = json_decode(json: $response->getBody()->getContents(), flags: JSON_OBJECT_AS_ARRAY);

        return UserEntity::fromArray($responsePayload);
    }
}
