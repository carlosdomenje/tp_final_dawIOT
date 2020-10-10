<!doctype html>
@extends('layouts.app')

@section('content')
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

@endsection