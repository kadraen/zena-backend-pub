<?php

namespace App\Services;

use App\Models\Drink;
use App\Http\Resources\DrinkResource;

class DrinkService {

    // A Laravel adja át mindkettőt (függőségbefecskendezés).
    public function __construct(
        protected TypeService $typeService,
        protected PackageService $packageService,
    ) {}

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
        $drink->type_id = $this->typeService->getId( $validated[ "type" ] );
        $drink->package_id = $this->packageService->getId( $validated[ "package" ] );

        $drink->save();
        
        return $drink;
    }
}