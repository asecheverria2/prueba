@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Solicitud </h3>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('solicituds.update',['solicitud'=>$solicitud->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        <div class="form-group">
            <label for="vivero_id">Vivero</label>
            <select class="form-control" name="vivero_id" id="vivero_id">
                @foreach((\App\Vivero::all() ?? [] ) as $vivero)
                <option value="{{$vivero->id}}"
                    @if($solicitud->vivero_id == old('vivero_id', $vivero->id))
                    selected="selected"
                    @endif
                >{{$vivero->nombre}}</option>

                @endforeach
            </select>
        </div>
                                <div class="form-group">
            <label for="planta_id">Planta</label>
            <select class="form-control" name="planta_id" id="planta_id">
                @foreach((\App\Planta::all() ?? [] ) as $planta)
                <option value="{{$planta->id}}"
                    @if($solicitud->planta_id == old('planta_id', $planta->id))
                    selected="selected"
                    @endif
                >{{$planta->nombrecomun}}</option>

                @endforeach
            </select>
        </div>
                

                                                                        <div class="form-group">
            <label for="fecha">Fecha</label>
                    <input class="form-control Date"  type="date"  name="fecha" id="fecha" value="{{old('fecha',$solicitud->fecha)}}"
                                    required="required"
                        >
                    @if($errors->has('fecha'))
            <p class="text-danger">{{$errors->first('fecha')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="direccion">Direccion</label>
                    <input class="form-control String"  type="text"  name="direccion" id="direccion" value="{{old('direccion',$solicitud->direccion)}}"
                                    required="required"
                        >
                    @if($errors->has('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="cantidad">Cantidad</label>
                    <input class="form-control String"  type="text"  name="cantidad" id="cantidad" value="{{old('cantidad',$solicitud->cantidad)}}"
                                    required="required"
                        >
                    @if($errors->has('cantidad'))
            <p class="text-danger">{{$errors->first('cantidad')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('solicituds.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection