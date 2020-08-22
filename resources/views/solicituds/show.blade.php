@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Solicitud</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('solicituds.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                                                        <div class="form-group">
            <label class="col-form-label" for="value">Fecha</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$solicitud->fecha}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Direccion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$solicitud->direccion}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Cantidad</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$solicitud->cantidad}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection