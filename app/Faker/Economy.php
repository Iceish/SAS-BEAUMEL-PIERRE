<?php

namespace App\Faker;

use Faker\Provider\Base;

class Economy extends Base
{
    public function paymentMode(): string
    {
        $names = [
            'bank_card',
            'bank_cheque',
            'cash'
        ];
        return static::randomElement($names);
    }

    public function price(): string
    {
        return static::randomFloat(2);
    }

    public function vatPercent(): float
    {
        return static::randomFloat(2,max:100);
    }
}
