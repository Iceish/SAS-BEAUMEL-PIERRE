<?php

namespace App\Faker;

use Faker\Provider\Base;

class Vehicle extends Base
{
    /**
     * Generate a random licence plate
     * @return string
     */
    public function licencePlate(): string
    {
        return static::regexify('[A-HJ-NP-TV-Z]{2}-[0-9]{3}-[A-HJ-NP-TV-Z]{2}');
    }

    public function carManufacturer(): string
    {
        $carsName = [
            "Acura",
            "Alfa-Romeo",
            "Aston Martin",
            "Audi",
            "BMW",
            "Bentley",
            "Buick",
            "Cadilac",
            "Chevrolet",
            "Chrysler",
            "Daewoo",
            "Daihatsu",
            "Dodge",
            "Eagle",
            "Ferrari",
            "Fiat",
            "Fisker",
            "Ford",
            "Freighliner",
            "GMC - General Motors Company",
            "Genesis",
            "Geo",
            "Honda",
            "Hummer",
            "Hyundai",
            "Infinity",
            "Isuzu",
            "Jaguar",
            "Jeep",
            "Kla",
            "Lamborghini",
            "Land Rover",
            "Lexus",
            "Lincoln",
            "Lotus",
            "Mazda",
            "Maserati",
            "Maybach",
            "McLaren",
            "Mercedez-Benz",
            "Mercury",
            "Mini",
            "Mitsubishi",
            "Nissan",
            "Oldsmobile",
            "Panoz",
            "Plymouth",
            "Polestar",
            "Pontiac",
            "Porsche",
            "Ram",
            "Rivian",
            "Rolls_Royce",
            "Saab",
            "Saturn",
            "Smart",
            "Subaru",
            "Susuki",
            "Tesla",
            "Toyota",
            "Volkswagen",
            "Volvo"
        ];
        return static::randomElement($carsName);
    }

    public function truckManufacturer(){
        $trucksName = [
            "ACMAT",
            "Berliet",
            "Chenard-Walcker",
            "Citroën",
            "DeDion-Bouton",
            "Delahaye",
            "FARTrucks",
            "Hotchkiss",
            "Labourier",
            "Latil",
            "Loheac",
            "Lorraine-Dietrich",
            "Nicolas",
            "Panhard",
            "Peugeot",
            "RenaultTrucks",
            "Saviem",
            "Sides",
            "Simca",
            "Somua",
            "TVSMotarFrance",
            "Unic",
            "Willème"
        ];
        return static::randomElement($trucksName);
    }
}
