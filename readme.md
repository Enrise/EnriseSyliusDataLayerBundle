# Google Enhanced Ecommerce Data Layer bundle for Sylius

[![Latest Version on Packagist][ico-version]][link-packagist]
[![CI][ico-actions]][link-actions]

Customizable Google Enhanced Ecommerce tracking in Sylius.

## Installation

Install the package and add the bundle to `config/bundles.php`.

`composer require enrise/syliusdatalayerbundle`

```php
[
    Enrise\SyliusDataLayerBundle\EnriseSyliusDataLayerBundle::class => ['all' => true],
];
```

[complete setup documentation](docs/setup.md)

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Credits

- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/enrise/syliusdatalayerbundle.svg?style=flat-square
[ico-actions]: https://img.shields.io/github/workflow/status/Enrise/SyliusDataLayerBundle/CI?label=CI%2FCD&style=flat-square

[link-actions]: https://github.com/Enrise/SyliusDataLayerBundle/actions?query=workflow%3ACI%2FCD
[link-packagist]: https://packagist.org/packages/enrise/syliusdatalayerbundle
[link-contributors]: ../../contributors
