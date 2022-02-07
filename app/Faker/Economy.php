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

    public function price(float $min=0, float $max=10000): string
    {
        return static::randomFloat(2,$min,$max);
    }

    public function vatPercent(): float
    {
        return static::randomFloat(2,max:100);
    }
}
