<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle;

final class DataLayer
{
    private string $event;

    private string $page;

    private int $customerId;

    private array $ecommerce;

    public function __construct(string $event, string $page, int $customerId, array $ecommerce)
    {
        $this->event = $event;
        $this->page = $page;
        $this->customerId = $customerId;
        $this->ecommerce = $ecommerce;
    }

    public function toArray(): array
    {
        return [
            'event' => $this->event,
            'pageType' => $this->page,
            'customerId' => $this->customerId,
            'ecommerce' => $this->ecommerce,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}