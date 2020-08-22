@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4> Plantas </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('plantas.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($plantas))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                                <td>Nombrecomun</td>
                
                                                <td>Nombrecientifico</td>
                
                                                <td>Familia</td>
                
                                                <td>Fechaingreso</td>
                
                                                <td>Descripcion</td>
                
                                                <td>Cantidad</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($plantas as $planta)
            <tr>
                <td>
                    <a href="{{route('plantas.show',['planta'=>$planta] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('plantas.edit',['planta'=>$planta] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-planta-{{$planta->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-planta-{{$planta->id}}" action="{{route('plantas.destroy',['planta'=>$planta])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                                                <td>{{$planta->nombrecomun}}</td>
                                                                <td>{{$planta->nombrecientifico}}</td>
                                                                <td>{{$planta->familia}}</td>
                                                                <td>{{$planta->fechaingreso}}</td>
                                                                <td>{{$planta->descripcion}}</td>
                                                                <td>{{$planta->cantidad}}</td>
                                                                                                                                
            </tr>
            @empty
            <p>No Existen Datos que Mostrar...</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection