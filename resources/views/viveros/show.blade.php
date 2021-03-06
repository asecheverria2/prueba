@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Vivero</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('viveros.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombre</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$vivero->nombre}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Direccion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$vivero->direccion}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Email</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$vivero->email}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Telefono</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$vivero->telefono}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection