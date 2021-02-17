# Setup

## Installation
Install the package and add the bundle to `config/bundles.php`.

`composer require enrise/syliusdatalayerbundle`

```php
[
    Enrise\SyliusDataLayerBundle\EnriseSyliusDataLayerBundle::class => ['all' => true],
];
```

## Layout
In the base layout where your `<head></head>` lives, add this piece of Twig:

```twig
{{ initDataLayers() }}
{% block trackingTags %}
{% endblock %}
```

## Rendering
On any page where you want to render a Data Layer all you need to do is call the render function inside the tracking tags block you previously added to your layout.

For example, for the 'thank you' page:

```twig
{% block trackingTags %}
    {{ renderDataLayer('thank-you', {'order': order}) }}
{% endblock %}

{% block content %}
...
{% endblock %}
```
