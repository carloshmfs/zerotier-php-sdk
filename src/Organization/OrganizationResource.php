<?php

namespace Carloshmfs\ZeroTierSDK\Organization;

use Carloshmfs\ZeroTierSDK\Organization\Entities\OrganizationEntity;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

readonly class OrganizationResource
{
    private const URI = 'https://api.zerotier.com/api/v1/network/org';

    public function __construct(
        private Client $client,
        #[\SensitiveParameter]
        private string $apiToken
    ) {
    }

    public function current(): OrganizationEntity
    {
        try {
            $response = $this->client->get(self::URI, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiToken,
                ],
            ]);
        } catch (GuzzleException $e) {
            match ($e->getCode()) {
                Response::HTTP_UNAUTHORIZED => throw OrganizationException::authorizationRequired(),
                Response::HTTP_FORBIDDEN => throw OrganizationException::accessDenied(),
                Response::HTTP_NOT_FOUND => throw OrganizationException::notFound(),
                default => throw OrganizationException::couldNotFetchOrganization($e->getMessage(), $e->getCode(), $e),
            };
        }

        $responsePayload = json_decode(json: $response->getBody()->getContents(), flags: JSON_OBJECT_AS_ARRAY);

        return OrganizationEntity::fromArray($responsePayload);
    }
}
