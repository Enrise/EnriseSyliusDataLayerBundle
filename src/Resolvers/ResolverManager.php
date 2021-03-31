<?php

declare(strict_types=1);

namespace Enrise\SyliusDataLayerBundle\Resolvers;

use Enrise\SyliusDataLayerBundle\DataLayer;

final class ResolverManager
{
    /** @var iterable<ResolverInterface> */
    private iterable $resolvers;

    public function __construct(iterable $resolvers = [])
    {
        $this->resolvers = $resolvers;
    }

    public function handle(string $type, array $data = []): DataLayerInterface
    {
        $resolver = $this->findSupportedResolver($type);

        return $resolver->resolve($data);
    }

    private function findSupportedResolver(string $type): ResolverInterface
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($type)) {
                return $resolver;
            }
        }

        throw new ResolverNotFoundException('No resolver found for ' . $type);
    }
}
