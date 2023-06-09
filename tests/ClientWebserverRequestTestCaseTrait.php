<?php

declare(strict_types=1);

namespace PHPUnitForGatoGraphQL\WebserverRequests;

use GraphQLByPoP\GraphQLClientsForWP\Constants\CustomHeaders;

/**
 * Test that enabling/disabling clients (GraphiQL/Voyager)
 * in Custom Endpoints works well
 */
trait ClientWebserverRequestTestCaseTrait
{
    use RequestURLWebserverRequestTestCaseTrait;

    protected function doTestEnabledOrDisabledClients(
        string $clientEndpoint,
        int $expectedStatusCode,
        bool $enabled,
    ): void {
        $this->doTestEnabledOrDisabledPath(
            $clientEndpoint,
            $expectedStatusCode,
            null,
            $enabled,
        );
    }

    protected function getCustomHeader(): ?string
    {
        return CustomHeaders::CLIENT_ENDPOINT;
    }
}
