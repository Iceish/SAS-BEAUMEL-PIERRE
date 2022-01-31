<?php

namespace App\Faker;

use Faker\Provider\Base;

class PaymentMode extends Base
{
    protected static $names = [
        'CakePHP',
        'CodeIgniter',
        'Laravel',
        'Lumen',
        'Phalcon',
        'Slim',
        'Symfony',
    ];
    public function paymentMode(): string
    {
        return static::randomElement(static::$names);
    }
}
