<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TratamientoPostRequest;
use App\Tratamiento;


class TratamientoController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function show(Request $request, Tratamiento $tratamiento)
    {
        return view('tratamientos.show', compact('tratamiento'));
    }

    public function create()
    {
        return view('tratamientos.create');
    }

    public function store(TratamientoPostRequest $request)
    {
        $data = $request->validated();
        $tratamiento = Tratamiento::create($data);
        return redirect()->route('tratamientos.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Tratamiento $tratamiento)
    {
        return view('tratamientos.edit', compact('tratamiento'));
    }

    public function update(TratamientoPostRequest $request, Tratamiento $tratamiento)
    {
        $data = $request->validated();
        $tratamiento->fill($data);
        $tratamiento->save();
        return redirect()->route('tratamientos.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        return redirect()->route('tratamientos.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
