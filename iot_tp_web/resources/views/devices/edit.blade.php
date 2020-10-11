<!doctype html>
@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="jumbotron">
  
     <h1 class="display-4">EDITAR {{$device->name}}</h1>
    <br>
    <hr class="my-2">
    <br>
    <p>Edite el campo que requiera actualizar.</p>
  </div>

  
  <form method="POST" action="{{ route('devs.update', $device) }}">
  @csrf @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$device->name}}">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">ID Dispositivo</label>
      <input type="text" class="form-control" id="inputPassword4" name="dev_id" value="{{$device->dev_id}}">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword5">MAC ID</label>
      <input type="text" class="form-control" id="inputPassword5" name="mac" value="{{$device->mac}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">CONFIRMAR EDICION</button>
</form>


</div>

@endsection


<!--

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">EDITAR DISPOSITIVO</h3>   
                    
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>MAC Address</th>     
                        <th>Accion</th>                     
                    </tr>
                    </thead>
                    <tbody>
                    
                    
                                   
                   
                    
                    
                    
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('devs.update', $device) }}">
                            @csrf @method('PUT')
                         <input type="text" name="name" value="{{$device->name}}">
                         <input type="text" name="dev_id" value="{{$device->dev_id}}">
                        <input type="text" name="mac" value="{{$device->mac}}">  
                        <button type="submit" class="btn btn-primary">
                                    CONFIRMAR EDICION
                                </button>
                        </form>   
-->