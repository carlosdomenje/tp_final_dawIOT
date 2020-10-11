<!doctype html>
@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="jumbotron">
  
     <h1 class="display-4">CREAR NUEVO DISPOSITIVO</h1>
    <br>
    <hr class="my-2">
    <br>
    <p>Para crear un nuevo dispositivo complete los campos de la lista.</p>
  </div>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" >NOMBRE</th>
        <th scope="col" >IDENTIFICADOR</th>
        <th scope="col" >MAC ID</th>
      </tr>
    </thead>
    <tbody>     
      
    </tbody>
  </table>
</div>

@endsection


<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">DISPOSITIVOS</h3>   
                    
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
<form method="POST" action="{{ route('devs.index') }}">
                            @csrf
                         <input type="text" name="name">
                         <input type="text" name="dev_id">
                        <input type="text" name="mac">  
                        <button type="submit" class="btn btn-primary">
                                    CREAR
                                </button>
                        </form>   -->