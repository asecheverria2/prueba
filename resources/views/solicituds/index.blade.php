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
                    <h4> Solicituds </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('solicituds.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($solicituds))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                
                                                <td>Fecha</td>
                
                                                <td>Direccion</td>
                
                                                <td>Cantidad</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($solicituds as $solicitud)
            <tr>
                <td>
                    <a href="{{route('solicituds.show',['solicitud'=>$solicitud] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('solicituds.edit',['solicitud'=>$solicitud] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-solicitud-{{$solicitud->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-solicitud-{{$solicitud->id}}" action="{{route('solicituds.destroy',['solicitud'=>$solicitud])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                                                                                <td>{{$solicitud->fecha}}</td>
                                                                <td>{{$solicitud->direccion}}</td>
                                                                <td>{{$solicitud->cantidad}}</td>
                                                                                                                                
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