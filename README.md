### Country list ###
Country list with ISO3166 (alpha-2 and 3) and IOC codes

Countrie.json file creation:

1. `git clone https://github.com/mledoze/countries`
1. `composer install`
1. `php countries.php convert -f json -i name -i cca2 -i cca3 -i cioc -i region`
1. the converted file is located at dist/countries.json

### Usage ###
Composer:

``` composer
 require unitedworldwrestling/countrycio dev-master
```

PHP class:

``` php
use Unitedworldwrestling\Countrycio\CountrycioDB;

...

    $countrycioDB = new CountrycioDB();
/*
    $countrycioDB->search($needle, $searchType='cca2', $returnKeys = [])
    $searchType any of 'name','cca2','cca3','cioc','region'
    $returnKeys an array of searchType values to be included in the response

    The search function returns with an array of countries matching to the given searchType and includes fields specified in returnKeys (or all fields, if the parameter is empty)
*/

    $ciocCodes = $countrycioDB->search('CH','cca2','cioc');
    $target  = empty($ciocCodes) ? '' : $ciocCodes[0]['cioc'] ?? '';

```