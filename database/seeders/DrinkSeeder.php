<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        $sql = file_get_contents( __DIR__ . "/drink.sql" );

        // Tranzakcióban: ha bármelyik INSERT elhasal, a többi sem marad bent.
        DB::transaction( fn () => DB::unprepared( $sql ));
    }
}
