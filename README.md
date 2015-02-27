# Laravel TvDb
A Laravel 5 wrapper for [Moinax/TvDb](https://github.com/Moinax/TvDb). See his docs for how to use the TvDb-API.

## Install
Put this in your `composer.json`.
``` json
"require": {
    "bstien/laravel-tvdb": "1.0.0"
},
"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/bstien/laravel-tvdb"
		}
]
```

Publish the config
```bash
php artisan vendor:publish
```

Enter your API key in the config file `config/tvdb.php`.  
If needed, feel free to alter the either the path or TTL for cache. Please note the cache-path is relative to `[app root]/storage` and must start with a '/'.

In your `config/app.php` add `TvDbServiceProvider` to the array of ServiceProviders.

**In order to use this package, you need an API-key from [TheTvDb.com](http://thetvdb.com/?tab=apiregister)**.

## Usage
```php
use Stien\TvDb\Facades\TvDb;
# You can add this to your Facades under config/app.php if you like

$serie = TvDb::getSerie(75710);
echo $serie->name;

```
