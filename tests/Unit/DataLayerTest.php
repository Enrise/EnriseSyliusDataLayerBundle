<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Tests\Unit;

use Enrise\SyliusDataLayerBundle\DataLayer;
use Mockery\Adapter\Phpunit\MockeryTestCase;

final class DataLayerTest extends MockeryTestCase
{
    public function test_it_can_generate_json_from_input(): void
    {
        $dataLayer = new DataLayer('my event', 'my page', 1, ['custom' => 'data']);

        $expectedArray = [
            'event' => 'my event',
            'pageType' => 'my page',
            'customerId' => 1,
            'ecommerce' => [
                'custom' => 'data',
            ],
        ];
        $expectedJson = '{"event":"my event","pageType":"my page","customerId":1,"ecommerce":{"custom":"data"}}';

        self::assertSame($expectedArray, $dataLayer->toArray());
        self::assertSame($expectedJson, $dataLayer->toJson());
    }
}
