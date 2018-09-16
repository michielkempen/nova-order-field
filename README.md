# Nova Order Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/michielkempen/nova-order-field.svg)](https://packagist.org/packages/michielkempen/nova-order-field)
[![Total Downloads](https://img.shields.io/packagist/dt/michielkempen/nova-order-field.svg)](https://packagist.org/packages/michielkempen/nova-order-field)

### Description

A field that adds reordering functionality to your Laravel Nova resource's index using the [eloquent-sortable](https://github.com/spatie/eloquent-sortable) package by [Spatie](https://spatie.be).

### Demo

![Demo](https://raw.githubusercontent.com/michielkempen/nova-order-field/master/docs/screenshot.png)

### Installation

This package can be installed through Composer.

```bash
composer require michielkempen/nova-order-field
```

### Usage

Follow the [usage instructions](https://github.com/spatie/eloquent-sortable#usage) on the eloquent-sortable repository to make your model sortable.

Add the `MichielKempen\NovaOrderField\Orderable` trait to your Nova Resource.

```php
use MichielKempen\NovaOrderField\Orderable;

class Page extends Resource
{
    use Orderable;
}
```

Add a public static property called `$defaultSortField` to your resource, containing your order column.

```php
class Page extends Resource
{
    public static $defaultOrderField = 'order';
}
```

Add the `OrderField` to your Nova Resource `fields` method.

```php
use \MichielKempen\NovaOrderField\OrderField;

class Page extends Resource
{
    public function fields(Request $request)
    {
        return [
			OrderField::make('Order'),
        ];
    }
}
```
