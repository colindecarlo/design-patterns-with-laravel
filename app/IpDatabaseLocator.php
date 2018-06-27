<?php

namespace App;

class IpDatabaseLocator implements Locator
{
    public function fromIp($ipAddress)
    {
        $locator = new IPDatabase;
        $location = $locator->findByIpAddress($ipAddress);

        return new Mark(
            $location['country'],
            $location['state_or_province'],
            $location['city_name']
        );
    }
}
