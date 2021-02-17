<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Tests\Unit\Resolvers;

use Enrise\SyliusDataLayerBundle\DataLayer;
use Enrise\SyliusDataLayerBundle\Resolvers\ResolverInterface;
use Enrise\SyliusDataLayerBundle\Resolvers\ResolverManager;
use Enrise\SyliusDataLayerBundle\Resolvers\ResolverNotFoundException;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;

final class ResolverManagerTest extends MockeryTestCase
{
    public function test_it_can_find_a_supported_resolver_and_map_data(): void
    {
        $mockResolverTrue = Mockery::mock(ResolverInterface::class);
        $mockResolverTrue->expects('supports')->with('Test\Test')->andReturnTrue();
        $mockResolverTrue->expects('resolve')->with([1, 2])->andReturn(new DataLayer('test', 'test', 1, [3, 4]));

        $mockResolverFalse = Mockery::mock(ResolverInterface::class);
        $mockResolverFalse->expects('supports')->with('Test\Test')->andReturnFalse();

        $manager = new ResolverManager([$mockResolverFalse, $mockResolverTrue]);
        $dataLayer = $manager->handle('Test\Test', [1, 2]);

        $expected = [
            'event' => 'test',
            'pageType' => 'test',
            'customerId' => 1,
            'ecommerce' => [3, 4],
        ];

        self::assertSame($expected, $dataLayer->toArray());
    }

    public function test_it_throws_an_error_if_no_resolver_is_supporting_the_type(): void
    {
        $manager = new ResolverManager([]);

        $this->expectException(ResolverNotFoundException::class);
        $this->expectExceptionMessage('No resolver found for Test\Test');
        $manager->handle('Test\Test', [1, 2]);
    }
}
