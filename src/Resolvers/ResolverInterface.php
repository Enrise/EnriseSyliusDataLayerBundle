<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Resolvers;

use Enrise\SyliusDataLayerBundle\DatalayerInterface;

interface ResolverInterface
{
    public function supports(string $type): bool;

    public function resolve(array $data): DatalayerInterface;
}
