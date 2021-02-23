<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle;

final class DataLayer
{
    private string $event;

    private array $ecommerce;

    private ?string $page;

    private ?int $customerId;

    public function __construct(string $event, array $ecommerce, ?string $page = null, ?int $customerId = null)
    {
        $this->event = $event;
        $this->page = $page;
        $this->customerId = $customerId;
        $this->ecommerce = $ecommerce;
    }

    public function toArray(): array
    {
        $dataLayer = [
            'event' => $this->event,
            'ecommerce' => $this->ecommerce,
        ];

        if ($this->page !== null) {
            $dataLayer['pageType'] = $this->page;
        }

        if ($this->customerId !== null) {
            $dataLayer['customerId'] = $this->customerId;
        }

        return $dataLayer;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
