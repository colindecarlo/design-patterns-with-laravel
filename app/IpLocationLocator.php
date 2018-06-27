<?php

namespace App;

class IpLocationLocator implements Locator
{
    public function fromIp($ipAddress)
    {
        $locator = new IpLocation;
        $location = $locator->locate($ipAddress);

        return new Mark(
            $location['country_name'],
            $location['region_name'],
            $location['city']
        );
    }
}
