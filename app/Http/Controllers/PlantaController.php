<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlantaPostRequest;
use App\Planta;


class PlantaController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $plantas = Planta::all();
        return view('plantas.index', compact('plantas'));
    }

    public function show(Request $request, Planta $planta)
    {
        return view('plantas.show', compact('planta'));
    }

    public function create()
    {
        return view('plantas.create');
    }

    public function store(PlantaPostRequest $request)
    {
        $data = $request->validated();
        $planta = Planta::create($data);
        return redirect()->route('plantas.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Planta $planta)
    {
        return view('plantas.edit', compact('planta'));
    }

    public function update(PlantaPostRequest $request, Planta $planta)
    {
        $data = $request->validated();
        $planta->fill($data);
        $planta->save();
        return redirect()->route('plantas.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Planta $planta)
    {
        $planta->delete();
        return redirect()->route('plantas.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
