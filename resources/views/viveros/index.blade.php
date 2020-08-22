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
                    <h4> Viveros </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('viveros.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($viveros))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Nombre</td>
                
                                                <td>Direccion</td>
                
                                                <td>Email</td>
                
                                                <td>Telefono</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($viveros as $vivero)
            <tr>
                <td>
                    <a href="{{route('viveros.show',['vivero'=>$vivero] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('viveros.edit',['vivero'=>$vivero] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-vivero-{{$vivero->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-vivero-{{$vivero->id}}" action="{{route('viveros.destroy',['vivero'=>$vivero])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$vivero->nombre}}</td>
                                                                <td>{{$vivero->direccion}}</td>
                                                                <td>{{$vivero->email}}</td>
                                                                <td>{{$vivero->telefono}}</td>
                                                                                                                                
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