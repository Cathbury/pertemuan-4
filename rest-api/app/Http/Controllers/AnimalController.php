<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $data = array();

    public function __construct(){
        $this->data = ['Anjing', 'Kelinci', 'Kura-Kura'];
    }

    function index()
    {
        return $this->data;
    }

    function store(Request $request)
    {
        $namaHewan = $request->nama;
        array_push($this->data, $namaHewan);
        return $this->data;
    }

    function update(Request $request, $id)
    {
        $updateNama = $request->nama;
        $replaceData = array($id => $updateNama);
        $this->data = array_replace($this->data, $replaceData);
        return $this->data;
    }

    function destroy($id)
    {
        unset($this->data[$id]);
        return $this->data;
    }
}
