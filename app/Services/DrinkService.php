<?php

namespace App\Services;

use App\Models\Drink;
use App\Http\Resources\DrinkResource;

class DrinkService {

    public function __construct() {}
	
    public function getDrinks() {

        $drinks = Drink::with( "type", "package" )->get();

        return DrinkResource::collection( $drinks );
    }

    public function getDrink( Drink $drink ) {

        $oneDrink = $drink->load( "type", "package" );

        return ( new DrinkResource( $oneDrink ));
    }

    public function createDrink( $validated ) {

        $drink = new Drink();
        $drink->name = $validated[ "drink" ];
        $drink->amount = $validated[ "amount" ];
        $drink->price = $validated[ "price" ];
        $drink->type_id = 1;
        $drink->package_id = 1;

        $drink->save();
        
        return $drink;
    }
}