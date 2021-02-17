<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Resolvers;

use Enrise\SyliusDataLayerBundle\DataLayer;

interface ResolverInterface
{
    public function supports(string $type): bool;

    public function resolve(array $data): DataLayer;
}
