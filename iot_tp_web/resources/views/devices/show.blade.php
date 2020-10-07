<!doctype html>
@extends('layouts.app')

@section('content')
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
                        <th>{{$device->name}}</th>
                        <th>MAC {{$device->mac}}</th>     
                        <th>Accion</th>                     
                    </tr>
                    </thead>
                    <tbody>
                    
                    <subs-component topic={{$device->mac}}></subs-component>
                                   
                   
                    
                    
                    
                    </tbody>
                    </table>
                </div>
                <div class="container">
        <div class="panel panel-default">
              <div class="panel-body">
              <br>
              <br>

<div>
  <line-chart></line-chart>
  <gauge-chart></gauge-chart>
  
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection