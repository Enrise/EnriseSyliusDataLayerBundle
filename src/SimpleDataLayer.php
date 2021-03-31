<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle;

final class SimpleDataLayer implements DatalayerInterface
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
