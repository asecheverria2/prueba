@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4>Ver Planta</h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:15px"> 
                    <a href="{{route('plantas.index')}}" class="btn btn-primary">Regresar</a>
                </div>
            </div>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombrecomun</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->nombrecomun}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Nombrecientifico</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->nombrecientifico}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Familia</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->familia}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Fechaingreso</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->fechaingreso}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Descripcion</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->descripcion}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Cantidad</label>
            <input type="text" readonly class="form-control" id="staticEmail" value="{{$planta->cantidad}}">
        </div>
                                                                    </div>

    </div>
</div>
@endsection