<!doctype html>
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="jumbotron">
     <h1 class="display-4">DISPOSITIVO - {{$device->name}}</h1>
    <br>
    <hr class="my-2">
    <br>
    <h3>Visualizacion en tiempo real de dispositivos IoT y mediciones historicas</h3>  
  </div>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col" >NOMBRE</th>
        <th scope="col" >MAC</th>
        <th scope="col" class="text-center">ACCIONES</th>
        <th class="text-center" >LED STATUS</th>
      </tr>
    </thead>
    <tr>            
        <td>                    
        {{ $device->name}}
        </td>
        <td>{{ $device->mac}}</td>
        <td class="text-center">                     
            <mqtt-component topic='{{$device->mac}}/led'></mqtt-component>
        </td>
        <td class="text-center">
            <status-component topic='{{$device->mac}}/status'></status-component>
        </td>
    </tr>  
</table>

<table class="table table-striped">   
      <tr>
        <th scope="col" >
            <div class="card">
                <div class="card-body"> 
                    <gauge-chart topic='{{$device->mac}}/value'></gauge-chart>
                </div>        
            </div>
        </th>
        <th scope="col" >
            <div class="card">
                <div class="card-body"> 
                    <line-chart mac={{$device->mac}}></line-chart>
                </div>        
            </div>
        </th>
        
      </tr>
</table>
</div>

<!--
<div class="w3-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">TIEMPO REAL - {{$device->name}}</h3>   
                    
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th>Nombre: {{$device->name}}</th>
                        <th>MAC: {{$device->mac}}</th>  
                        <th><mqtt-component topic='{{$device->mac}}/led'></mqtt-component></th>      
                        <th class="content-center" >ESTADO<status-component topic='{{$device->mac}}/status'></status-component></th>           
                    </tr>
                    </thead>
                    <tbody>
 
                    </tbody>
                    </table>
                </div>
                <div class="container">
        <div class="panel panel-default">
              <div class="panel-body">
              <br>
              <br>
</div>
    <line-chart mac={{$device->mac}}></line-chart>
<div>
<div  style="height: 300px;
  width: 300px;" class="container">
  
  <gauge-chart topic='{{$device->mac}}/value'></gauge-chart>
  


</div>

                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection