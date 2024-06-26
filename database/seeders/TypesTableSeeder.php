<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('types');
        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->color = $type['color'];
            // dd($newType);
            $newType->save();
        }
    }
}
