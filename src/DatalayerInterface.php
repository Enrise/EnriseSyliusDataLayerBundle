<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle;

interface DatalayerInterface
{
    public function toArray(): array;
    public function toJson(): string;
}
