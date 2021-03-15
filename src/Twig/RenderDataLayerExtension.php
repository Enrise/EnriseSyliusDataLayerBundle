<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Twig;

use Enrise\SyliusDataLayerBundle\Resolvers\ResolverManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RenderDataLayerExtension extends AbstractExtension
{
    private ResolverManager $manager;

    public function __construct(ResolverManager $manager)
    {
        $this->manager = $manager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('renderDataLayer', [$this, 'renderDataLayer'], ['is_safe' => ['html']]),
            new TwigFunction('getDataLayer', [$this, 'getDataLayer']),
            new TwigFunction('initDataLayers', [$this, 'initDataLayers'], ['is_safe' => ['html']]),
        ];
    }

    public function renderDataLayer(string $location, array $data = []): string
    {
        $dataLayer = $this->manager->handle($location, $data);

        return "<script>dataLayer.push({$dataLayer->toJson()})</script>";
    }
    
    public function getDataLayer(string $location, array $data = []): array
    {
        $dataLayer = $this->manager->handle($location, $data);

        return $dataLayer->toArray();
    }

    public function initDataLayers(): string
    {
        return "<script>window.dataLayer = window.dataLayer || [];</script>";
    }
}
