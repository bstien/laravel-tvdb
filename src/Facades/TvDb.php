<?php
namespace Stien\TvDb\Facades;

use Illuminate\Support\Facades\Facade;

class TvDb extends Facade{

	protected static function getFacadeAccessor()
	{
		return 'bstien.tvdb.client';
	}

}