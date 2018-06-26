<?php

namespace App;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class Mark
{
    public $country;
    public $region;
    public $city;

    public function __construct($country, $region, $city)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
    }

    public static function fromIp($ipAddress)
    {
        $ipLocator = new Client(['base_uri' => 'http://iplocation.com']);
        $response = $ipLocator->post('/', ['form_params' => ['ip' => $ipAddress]]);
        $location = json_decode((string)$response->getBody(), true);

        return new static(
            $location['country_name'],
            $location['region_name'],
            $location['city']
        );
    }
}
