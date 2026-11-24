<?php

namespace App\Services;

use App\Models\Package;

class PackageService {

    public function __construct() {}

    // A kiszerelés id-ja a neve alapján (a TypeService::getId párja).
    public function getId( string $name ): int {

        $package = Package::query()->where( "name", $name )->first();

        return $package->id;
    }
}
