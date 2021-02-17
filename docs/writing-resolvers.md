# Writing a resolver

First, create a directory for your new resolver(s).
In the example below this is `src/Services/DataLayer/Resolvers` but it can be anywhere you want.

```yaml
# === Data Layer resolvers === #
    App\Service\DataLayer\Resolvers\:
      resource: '../src/Service/DataLayer/Resolvers/*'
      tags:
        - 'enrise.sylius_data_layer.resolver'
```

This will automatically bind any class you place in that directory to the resolver manager of this package through the tag.

The resolver itself should implement the `ResolverInterface`. Here is part of a resolver for the 'thank you' page:

```php
<?php

declare(strict_types=1);

namespace App\Service\DataLayer\Resolvers;

use Enrise\SyliusDataLayerBundle\DataLayer;
use Enrise\SyliusDataLayerBundle\Resolvers\ResolverInterface;

final class ThankYouResolver implements ResolverInterface
{
    public function supports(string $type): bool
    {
        return $type === 'thank-you';
    }

    public function resolve(array $data): DataLayer
    {
        $order = $data['order'];

        return new DataLayer(
            'eec.purchase',
            'thank you',
            $order->getCustomer()->getId(),
            [] // Other data you want to place in the Data Layer.
        );
    }
}
```

You would call this resolver on any page with this Twig function:

```twig
{% block trackingTags %}
    {{ renderDataLayer('thank-you', {'order': order}) }}
{% endblock %}
```
