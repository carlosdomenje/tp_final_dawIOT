<!doctype html>
@extends('layouts.app')

@section('content')
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
@endsection