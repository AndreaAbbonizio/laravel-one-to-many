<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Marketing', 'Back End', 'Front End', 'Full Stack', 'UX', 'UI'];

        foreach ($types as $type) {

            $newtype = new Type();

            $newtype->name = $type;
            $newtype->slug = Str::slug($newtype->name, '-');
            $newtype->description = $faker->text(100);

            $newtype->save();
        }
    }
}
