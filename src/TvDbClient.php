<?php
namespace Stien\TvDb;

use Moinax\TvDb\Client;
use Moinax\TvDb\Http\Cache\FilesystemCache;
use Moinax\TvDb\Http\CacheClient;

class TvDbClient extends Client {

	/**
	 * @param      $baseUrl
	 * @param      $apiKey
	 * @param null $cachePath
	 * @param null $cacheTtl
	 */
	public function __construct($baseUrl, $apiKey, $cachePath = null, $cacheTtl = null)
	{
		parent::__construct($baseUrl, $apiKey);

		if ( $cachePath != null && is_string($cachePath) )
		{
			// Set default cache TTL to one week.
			($cacheTtl != null && is_int($cacheTtl)) ? $cacheTtl : 86400 * 7;

			// Create cache client and assign it to TvDb-client
			$cache = new FilesystemCache($cachePath);
			$httpClient = new CacheClient($cache, $cacheTtl);
			$this->setHttpClient($httpClient);
		}
	}
}