@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Planta </h3>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('plantas.update',['planta'=>$planta->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                                        <div class="form-group">
            <label for="tratamiento_id">Tratamiento</label>
            <select class="form-control" name="tratamiento_id" id="tratamiento_id">
                @foreach((\App\Tratamiento::all() ?? [] ) as $tratamiento)
                <option value="{{$tratamiento->id}}"
                    @if($planta->tratamiento_id == old('tratamiento_id', $tratamiento->id))
                    selected="selected"
                    @endif
                >{{$tratamiento->descripcion}}</option>

                @endforeach
            </select>
        </div>
                

                                                        <div class="form-group">
            <label for="nombrecomun">Nombrecomun</label>
                    <input class="form-control String"  type="text"  name="nombrecomun" id="nombrecomun" value="{{old('nombrecomun',$planta->nombrecomun)}}"
                                    required="required"
                        >
                    @if($errors->has('nombrecomun'))
            <p class="text-danger">{{$errors->first('nombrecomun')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="nombrecientifico">Nombrecientifico</label>
                    <input class="form-control String"  type="text"  name="nombrecientifico" id="nombrecientifico" value="{{old('nombrecientifico',$planta->nombrecientifico)}}"
                                    required="required"
                        >
                    @if($errors->has('nombrecientifico'))
            <p class="text-danger">{{$errors->first('nombrecientifico')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="familia">Familia</label>
                    <input class="form-control String"  type="text"  name="familia" id="familia" value="{{old('familia',$planta->familia)}}"
                                    required="required"
                        >
                    @if($errors->has('familia'))
            <p class="text-danger">{{$errors->first('familia')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="fechaingreso">Fechaingreso</label>
                    <input class="form-control DateTime"  type="text"  name="fechaingreso" id="fechaingreso" value="{{old('fechaingreso',$planta->fechaingreso)}}"
                                    required="required"
                        >
                    @if($errors->has('fechaingreso'))
            <p class="text-danger">{{$errors->first('fechaingreso')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="descripcion">Descripcion</label>
                    <input class="form-control String"  type="text"  name="descripcion" id="descripcion" value="{{old('descripcion',$planta->descripcion)}}"
                                    required="required"
                        >
                    @if($errors->has('descripcion'))
            <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="cantidad">Cantidad</label>
                    <input class="form-control String"  type="text"  name="cantidad" id="cantidad" value="{{old('cantidad',$planta->cantidad)}}"
                                    required="required"
                        >
                    @if($errors->has('cantidad'))
            <p class="text-danger">{{$errors->first('cantidad')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('plantas.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection