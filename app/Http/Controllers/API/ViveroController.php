<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\ViveroPostRequest;
use App\Http\Controllers\Controller;
use App\Vivero;

class ViveroController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Vivero::all();
    }

    public function show(Request $request, Vivero $vivero)
    {
        return $vivero;
    }

    public function store(ViveroPostRequest $request)
    {
        $data = $request->validated();
        $vivero = Vivero::create($data);
        return $vivero;
    }

    public function update(ViveroPostRequest $request, Vivero $vivero)
    {
        $data = $request->validated();
        $vivero->fill($data);
        $vivero->save();

        return $vivero;
    }

    public function destroy(Request $request, Vivero $vivero)
    {
        $vivero->delete();
        return $vivero;
    }

}
