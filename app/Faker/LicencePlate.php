<?php

namespace App\Faker;

use Faker\Provider\Base;

class LicencePlate extends Base
{
    /**
     * Generate a random licence plate
     * @return string
     */
    public function licencePlate(): string
    {
        $licence_plate = null;
        for($i =0;$i<2;$i++){
            $licence_plate .= static::randomLetter();
        }
        for($i =0;$i<3;$i++){
            $licence_plate .= static::randomNumber();
        }
        for($i =0;$i<2;$i++){
            $licence_plate .= static::randomLetter();
        }
        return $licence_plate;
    }
}
