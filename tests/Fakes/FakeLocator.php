<?php

namespace Tests\Fakes;

use App\Locator;
use App\Mark;

class FakeLocator implements Locator
{
    private $mark;

    public function __construct(Mark $mark)
    {
        $this->mark = $mark;
    }

    public static function returning(Mark $mark)
    {
        return new static($mark);
    }

    public function fromIp($ipAddress)
    {
        return $this->mark;
    }
}
