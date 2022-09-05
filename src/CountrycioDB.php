<?php

namespace Unitedworldwrestling\Countrycio;

class CountrycioDB
{
	private $database;
	public function __construct()
	{
		$this->database = json_decode(file_get_contents(__DIR__ . '/../data/countries.json'), true);
	}

	public function search($needle, $searchType='cca2', $returnKeys = [])
	{
		$acceptedKeys = ['name','cca2','cca3','cioc','region'];
		if (!is_array($returnKeys)) $returnKeys = [$returnKeys];
		if (empty($returnKeys)) $returnKeys = $acceptedKeys;
		$returnKeys = array_intersect($acceptedKeys, $returnKeys);
		$res = array_map(function ($el) use ($needle, $returnKeys, $searchType) {
			$retval = [];
			if ($el[$searchType] == $needle) {
				foreach ($returnKeys as $key) {
					$retval[$key] = $el[$key];
				}
			}
			return $retval;
		}, $this->database);

		return array_values(array_filter($res));
	}
}
