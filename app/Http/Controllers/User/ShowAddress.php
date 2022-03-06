<?php



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Faker\Factory;

class ShowAddress extends Controller
{
    public function __invoke(int $id)
    {
        $faker = Factory::create();
        $address = [
            'postalCode' => $faker->postcode,
            'street' => $faker->streetName,
            'houseNumber' => $faker -> numberBetween(1,30),
            'flatNumber' => $faker -> numberBetween(1,30),
        ];
        return view('user.address', [
           'address' => $address

        ]);
    }
}
