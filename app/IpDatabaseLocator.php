<?php

namespace App;

class IpDatabaseLocator
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
