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
                    <h4> Tratamientos </h4>
                </div>
                <div class="col-4" style="text-align:right;padding-right:35px"> 
                    <a href="{{route('tratamientos.create')}}" class="btn btn-success">Nuevo</a>
                </div>
            </div>
        </>
    <div class="card-body">

    <table class="table table-striped">
        @if(count($tratamientos))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                                <td>Fecha</td>
                
                                                <td>Descripcion</td>
                
                                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($tratamientos as $tratamiento)
            <tr>
                <td>
                    <a href="{{route('tratamientos.show',['tratamiento'=>$tratamiento] )}}" class="btn btn-info">Ver</a>
                    <a href="{{route('tratamientos.edit',['tratamiento'=>$tratamiento] )}}" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-tratamiento-{{$tratamiento->id}}').submit();" class="btn btn-danger">
                        Borrar
                    </a>
                    <form id="delete-tratamiento-{{$tratamiento->id}}" action="{{route('tratamientos.destroy',['tratamiento'=>$tratamiento])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                <td>{{$tratamiento->fecha}}</td>
                                                                <td>{{$tratamiento->descripcion}}</td>
                                                                                                                                
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