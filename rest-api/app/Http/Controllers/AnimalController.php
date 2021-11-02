<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals;

    function __construct() {
        $this->animals = ['Anjing', 'Kelinci', 'Kura-Kura'];
    }

    function index() {
        foreach ($this->animals as $animal) {
            echo "$animal";
        }
    }

    function store(Request $request) {
        array_push($this->animals, $request->nama);
        $this->index();
    }

    function update(Request $request, $id) {
        $this->animals[$id] = $request->nama;
        $this->index();
    }

    function destroy($id) {
        unset($this->animals[$id]);
        $this->index();
    }
}
