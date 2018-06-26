<?php

namespace App;

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
}
