<?php

namespace App;

class IpLocation
{
    private $locator;

    public function __construct()
    {
        $this->locator = new Client(['base_uri' => 'http://iplocation.com']);
    }

    public function locate($ipAddress)
    {
        $response = $this->locator->post('/', ['form_params' => ['ip' => $ipAddress]]);
        return json_decode((string)$response->getBody(), true);
    }
}
