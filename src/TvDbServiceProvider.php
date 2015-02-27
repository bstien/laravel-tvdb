<?php
namespace Stien\TvDb;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TvDbServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->setupConfig();
	}

	/**
	 * Setup the config.
	 *
	 * @return void
	 */
	protected function setupConfig()
	{
		$source = realpath(__DIR__ . '/../config/tvdb.php');
		$this->publishes([$source => config_path('tvdb.php')]);
		$this->mergeConfigFrom($source, 'tvdb');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerClient($this->app);
	}

	/**
	 * Registers the TvDb-client.
	 *
	 * @param Application $app
	 *
	 * @return void
	 */
	public function registerClient(Application $app)
	{
		$app->singleton('bstien.tvdb.client', function ($app)
		{
			// Set API-key
			$apiKey = $app['config']['tvdb.apikey'];

			// Set base URL for TvDb-Client
			$baseUrl = $app['config']['tvdb.base_url'];

			// Set cache-path.
			$cachePath = ! isset($app['config']['tvdb.cache.path']) ? "/cache/tvdb/" : $app['config']['tvdb.cache.path'];
			$cachePath = \App::storagePath() . $cachePath;

			// Set cache-TTL.
			$cacheTtl = ! isset($app['config']['tvdb.cache.ttl']) ? null : $app['config']['tvdb.cache.ttl'];

			return new TvDbClient($baseUrl, $apiKey, $cachePath, $cacheTtl);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['bstien.tvdb.client'];
	}
}