<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SolicitudPostRequest;
use App\Solicitud;


class SolicitudController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $solicituds = Solicitud::all();
        return view('solicituds.index', compact('solicituds'));
    }

    public function show(Request $request, Solicitud $solicitud)
    {
        return view('solicituds.show', compact('solicitud'));
    }

    public function create()
    {
        return view('solicituds.create');
    }

    public function store(SolicitudPostRequest $request)
    {
        $data = $request->validated();
        $solicitud = Solicitud::create($data);
        return redirect()->route('solicituds.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Solicitud $solicitud)
    {
        return view('solicituds.edit', compact('solicitud'));
    }

    public function update(SolicitudPostRequest $request, Solicitud $solicitud)
    {
        $data = $request->validated();
        $solicitud->fill($data);
        $solicitud->save();
        return redirect()->route('solicituds.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicituds.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
