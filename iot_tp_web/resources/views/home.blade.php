@extends('layouts.app')

<!DOCTYPE html>
@section('content')

<div class="container-fluid">

  <div class="jumbotron">
  
     <h1 class="display-4">DAW IoT - Home Page</h1>
    <br>
    <hr class="my-2">
    <br>
    <p>Para agregar nuevos dispositivos a la lista presione el boton agregar</p>
    <a type="button" class="btn btn-success btn-lg" href="{{ route('devs.add') }}">
      <i class="fas fa-plus pr-2" aria-hidden="true"></i>
      AGREGAR
    </a>
    
  </div>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" >#</th>
        <th scope="col" >NOMBRE</th>
        <th scope="col" >MAC - ID</th>
        <th scope="col" >FECHA DE CREACION</th>
        <th scope="col" class="text-center">OPCIONES</th>
      </tr>
    </thead>
    <tbody>     
      @forelse($devices as $devicesItem)
      <tr>            
        <th scope="row">{{$loop->iteration}}</th>
        <td>                    
        {{ $devicesItem->name}}
        </td>
        <td>{{ $devicesItem->mac}}</td>
        <td>                     
        {{ $devicesItem->created_at}}
        </td>
        <td class="text-center">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('devs.edit', $devicesItem) }}'">
            <i class="fas fa-edit pr-2" aria-hidden="true"></i>
            Editar
          </button>
          <form method= "POST" action="{{ route('devs.destroy', $devicesItem)}}">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" >
              <i class="fas fa-trash pr-2" aria-hidden="true"></i>
              Borrar
            </button>
          </form>
          <button type="button" class="btn btn-success" onclick="location.href='{{ route('devs.show', $devicesItem) }}'">
            <i class="fas fa-chart-bar pr-2" aria-hidden="true"></i>
            Mediciones
          </button>
        </div>
         
        </td>
        </tr>
      @empty
        <td>No hay dispositivos para mostrar</td>   
      
      @endforelse  
    </tbody>
  </table>
</div>
  @endsection

