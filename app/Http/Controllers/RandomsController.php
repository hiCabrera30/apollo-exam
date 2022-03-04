<?php

namespace App\Http\Controllers;

use App\Models\Random;
use App\Services\Randomizer;

class RandomsController extends Controller {
    
    protected $viewPath = "pages";


    public function index() {
        return $this->view("index");
    }

    public function getAll() {
        $randoms = Random::with("breakdowns")->isNew()->get();

        $randomIds = $randoms->pluck("id")->toArray();
        (new Randomizer)->changeRandomFlags($randomIds);

        return $this->resolve("Successfully fetched data", compact("randoms"));
    }

    public function store() {
        $randomizer = new Randomizer;
        $randomizer->generateRandoms();

        return $this->resolve("Successfully registered randoms");
    }

}
