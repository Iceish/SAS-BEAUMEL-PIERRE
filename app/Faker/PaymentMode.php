<?php

namespace App\Faker;

use Faker\Provider\Base;

class PaymentMode extends Base
{
    protected static $names = [
        'bank_card',
        'bank_cheque',
        'cash'
    ];
    public function paymentMode(): string
    {
        return static::randomElement(static::$names);
    }
}
