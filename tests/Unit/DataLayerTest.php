<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Tests\Unit;

use Enrise\SyliusDataLayerBundle\DataLayer;
use Mockery\Adapter\Phpunit\MockeryTestCase;

final class DataLayerTest extends MockeryTestCase
{
    public function test_it_can_generate_json_from_input(): void
    {
        $dataLayer = new DataLayer('my event', ['custom' => 'data'], 'my page', 1);

        $expectedArray = [
            'event' => 'my event',
            'ecommerce' => [
                'custom' => 'data',
            ],
            'pageType' => 'my page',
            'customerId' => 1,
        ];
        $expectedJson = '{"event":"my event","ecommerce":{"custom":"data"},"pageType":"my page","customerId":1}';

        self::assertSame($expectedArray, $dataLayer->toArray());
        self::assertSame($expectedJson, $dataLayer->toJson());
    }

    public function test_it_does_not_include_customer_id_field_if_id_is_null(): void
    {
        $dataLayer = new DataLayer('my event', ['custom' => 'data'], 'my page', null);

        $expectedArray = [
            'event' => 'my event',
            'ecommerce' => [
                'custom' => 'data',
            ],
            'pageType' => 'my page',
        ];

        self::assertSame($expectedArray, $dataLayer->toArray());
    }
}
