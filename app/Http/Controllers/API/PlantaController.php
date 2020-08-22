<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\PlantaPostRequest;
use App\Http\Controllers\Controller;
use App\Planta;

class PlantaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Planta::all();
    }

    public function show(Request $request, Planta $planta)
    {
        return $planta;
    }

    public function store(PlantaPostRequest $request)
    {
        $data = $request->validated();
        $planta = Planta::create($data);
        return $planta;
    }

    public function update(PlantaPostRequest $request, Planta $planta)
    {
        $data = $request->validated();
        $planta->fill($data);
        $planta->save();

        return $planta;
    }

    public function destroy(Request $request, Planta $planta)
    {
        $planta->delete();
        return $planta;
    }

}
