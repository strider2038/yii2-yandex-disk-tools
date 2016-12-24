YandexDiskTools
===============
Useful classes and tools for working with Yandex.Disk throw Yandex.Disk API

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist strider2038/yii2-yandex-disk-tools "*"
```

or add

```
"strider2038/yii2-yandex-disk-tools": "*"
```

to the require section of your `composer.json` file.


Usage
-----

#### strider2038\yandexDiskTools\Client
This is a simple wrapper class for original [Yandex\Disk\DiskClient](https://github.com/nixsolutions/yandex-php-library). To use it put this in your config.

```php
<?php

return [
	// ...
	'components' => [
		// ...
		'yadisk' => [
			'class' => '\strider2038\yandexDiskTools\Client',
			'token' => '', // you access token for Yandex API
		]
	]
];
```