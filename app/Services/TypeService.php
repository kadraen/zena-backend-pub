<?php

namespace App\Services;

use App\Models\Type;

class TypeService {

    public function __construct() {}

    // A típus id-ja a neve alapján. A DrinkRequest exists szabálya miatt
    // ide csak létező név jut, ezért a first() nem ad null-t.
    // A query() valódi metódus, így a phpactor is látja a where()-t
    // (a Type::where() csak futás közben, mágikusan létezik).
    public function getId( string $name ): int {

        $type = Type::query()->where( "name", $name )->first();

        return $type->id;
    }
}
