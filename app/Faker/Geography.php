<?php

namespace App\Faker;

use Faker\Provider\Base;

class Geography extends Base
{
    public function frenchPostalCode(): string
    {
        return static::regexify('[0-8]{1}[0-9]{1}[0-9]{3}');
    }
}
