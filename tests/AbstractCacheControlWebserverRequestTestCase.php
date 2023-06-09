<?php

declare(strict_types=1);

namespace PHPUnitForGatoGraphQL\WebserverRequests;

abstract class AbstractCacheControlWebserverRequestTestCase extends AbstractWebserverRequestTestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('provideCacheControlEntries')]
    public function testCacheControl(
        string $endpoint,
        string $expectedCacheControlValue,
    ): void {
        $client = static::getClient();
        $endpointURL = static::getWebserverHomeURL() . '/' . $endpoint;
        $options = static::getRequestBasicOptions();
        $response = $client->get(
            $endpointURL,
            $options
        );

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString($expectedCacheControlValue . ',', $response->getHeaderLine('Cache-Control'));
    }

    /**
     * @return array<string,string[]>
     */
    abstract public static function provideCacheControlEntries(): array;
}
