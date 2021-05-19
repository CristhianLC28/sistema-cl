@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<a href="{{url('empleados/create')}}" class="btn btn-success">Agregar en Agenda</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
    
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
<tbody>
@foreach($empleados as $empleado)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>

        <td>{{$empleado->Correo}}</td>
        <td> 
        
        <a class="btn btn-warning" href="{{url('/empleados/'.$empleado->id.'/edit' )}}">Editar</a>
        
         
        
        <form method="post" action="{{url('/empleados/'.$empleado->id)}}" style="display:inline">
        {{csrf_field()}}
        {{ method_field('DELETE')}}
        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
        </form>   
        
        </td>
    </tr>
@endforeach
</tbody>
</table>
</div>
@endsection