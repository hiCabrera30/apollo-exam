<?php

namespace App\Services;

use Faker\Factory;
use App\Models\Random;
use Illuminate\Support\Str;

class Randomizer {

    public function changeRandomFlags(array $randomIds) {
        Random::whereIn("id", $randomIds)->update(["flag" => true]);
    }

    public function generateRandoms() {
        $iteration = rand(5, 10);
        $faker     = Factory::create();

        for ($i = 0; $i < $iteration; $i++) {
            $random = Random::create([
                "value" => $faker->name(),
                "flag"  => false,
            ]);

            $this->generateBreakdowns($random);
        }
    }

    public function generateBreakdowns(Random $random) {
        $iteration  = rand(5, 10);
        $breakdowns = [];

        for ($i = 0; $i < $iteration; $i++) {
            array_push($breakdowns, [
                "value"     => Str::random(5),
                "random_id" => $random->id,
            ]);
        }

        return $random->createBreakdowns($breakdowns);
    }

}