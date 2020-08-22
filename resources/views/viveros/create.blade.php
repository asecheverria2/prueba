@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Crear Vivero </h3>
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul @endif <form action="{{route('viveros.store')}}" method="POST" novalidate>
        @csrf
        
                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                        <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre')}}"             maxlength="50"
                                    required="required"
                        >
                        @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="direccion">Direccion</label>
                        <input class="form-control String"  type="text"  name="direccion" id="direccion" value="{{old('direccion')}}"             maxlength="50"
                                    required="required"
                        >
                        @if($errors->has('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="email">Email</label>
                        <input class="form-control String"  type="text"  name="email" id="email" value="{{old('email')}}"             maxlength="50"
                                    required="required"
                        >
                        @if($errors->has('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="telefono">Telefono</label>
                        <input class="form-control String"  type="text"  name="telefono" id="telefono" value="{{old('telefono')}}"             maxlength="15"
                                    required="required"
                        >
                        @if($errors->has('telefono'))
            <p class="text-danger">{{$errors->first('telefono')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('viveros.index')}}" class="btn btn-primary">Regresar</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection