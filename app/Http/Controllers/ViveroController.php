<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViveroPostRequest;
use App\Vivero;


class ViveroController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $viveros = Vivero::all();
        return view('viveros.index', compact('viveros'));
    }

    public function show(Request $request, Vivero $vivero)
    {
        return view('viveros.show', compact('vivero'));
    }

    public function create()
    {
        return view('viveros.create');
    }

    public function store(ViveroPostRequest $request)
    {
        $data = $request->validated();
        $vivero = Vivero::create($data);
        return redirect()->route('viveros.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Vivero $vivero)
    {
        return view('viveros.edit', compact('vivero'));
    }

    public function update(ViveroPostRequest $request, Vivero $vivero)
    {
        $data = $request->validated();
        $vivero->fill($data);
        $vivero->save();
        return redirect()->route('viveros.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Vivero $vivero)
    {
        $vivero->delete();
        return redirect()->route('viveros.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
