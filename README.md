# laravel-simple-html-dom
Laravel wrapper for the PHP Simple HTML DOM Parser package

## Instalation
Require this package with composer:
> composer require sontungx305/laravel-simple-html-dom

## Usage
```php
$name = SimpleHTMLDom::str_get_html($html)->find('div.main > span')[0]->plaintext;
```