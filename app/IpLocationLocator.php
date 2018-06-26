<?php

namespace App;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class IpLocationLocator implements Locator
{
    public function fromIp($ipAddress)
    {
        $ipLocator = new Client(['base_uri' => 'http://iplocation.com']);
        $response = $ipLocator->post('/', ['form_params' => ['ip' => $ipAddress]]);
        $location = json_decode((string)$response->getBody(), true);

        return new Mark(
            $location['country_name'],
            $location['region_name'],
            $location['city']
        );
    }
}
