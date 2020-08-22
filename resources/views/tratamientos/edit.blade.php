@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Tratamiento </h3>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('tratamientos.update',['tratamiento'=>$tratamiento->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
                        

                                        <div class="form-group">
            <label for="fecha">Fecha</label>
                    <input class="form-control Date"  type="date"  name="fecha" id="fecha" value="{{old('fecha',$tratamiento->fecha)}}"
                                    required="required"
                        >
                    @if($errors->has('fecha'))
            <p class="text-danger">{{$errors->first('fecha')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="descripcion">Descripcion</label>
                    <input class="form-control String"  type="text"  name="descripcion" id="descripcion" value="{{old('descripcion',$tratamiento->descripcion)}}"
                                    required="required"
                        >
                    @if($errors->has('descripcion'))
            <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('tratamientos.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection