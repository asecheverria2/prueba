<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SolicitudPostRequest;
use App\Http\Controllers\Controller;
use App\Solicitud;

class SolicitudController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth:api');
    }


    public function index()
    {
        return Solicitud::all();
    }

    public function show(Request $request, Solicitud $solicitud)
    {
        return $solicitud;
    }

    public function store(SolicitudPostRequest $request)
    {
        $data = $request->validated();
        $solicitud = Solicitud::create($data);
        return $solicitud;
    }

    public function update(SolicitudPostRequest $request, Solicitud $solicitud)
    {
        $data = $request->validated();
        $solicitud->fill($data);
        $solicitud->save();

        return $solicitud;
    }

    public function destroy(Request $request, Solicitud $solicitud)
    {
        $solicitud->delete();
        return $solicitud;
    }

}
