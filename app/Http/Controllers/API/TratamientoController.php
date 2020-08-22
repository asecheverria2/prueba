<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\TratamientoPostRequest;
use App\Http\Controllers\Controller;
use App\Tratamiento;

class TratamientoController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Tratamiento::all();
    }

    public function show(Request $request, Tratamiento $tratamiento)
    {
        return $tratamiento;
    }

    public function store(TratamientoPostRequest $request)
    {
        $data = $request->validated();
        $tratamiento = Tratamiento::create($data);
        return $tratamiento;
    }

    public function update(TratamientoPostRequest $request, Tratamiento $tratamiento)
    {
        $data = $request->validated();
        $tratamiento->fill($data);
        $tratamiento->save();

        return $tratamiento;
    }

    public function destroy(Request $request, Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        return $tratamiento;
    }

}
