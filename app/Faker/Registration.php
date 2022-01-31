<?php

namespace App\Faker;

use Faker\Provider\Base;

class Registration extends Base
{
    public function registration(){
        $registration = null;
        for($i =0;$i<2;$i++){
            $registration .= static::randomLetter();
        }
        for($i =0;$i<3;$i++){
            $registration .= static::randomNumber();
        }
        for($i =0;$i<2;$i++){
            $registration .= static::randomLetter();
        }
    }
}
