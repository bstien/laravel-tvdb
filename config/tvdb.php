<?php
return [
	'api' => [
		# Your API-key to TheTvDb.com
		'key' => '',
		# The base_url for the API.
		'url' => 'http://thetvdb.com',
	],

	'cache' => [
		# Where to store cache
		'path' => \App::storagePath() . "/cache/tvdb/",
		# How long TTL, in seconds
		'ttl' => (86400 * 7),
	],
];