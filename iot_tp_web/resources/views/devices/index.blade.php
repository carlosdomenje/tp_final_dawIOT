<!doctype html>
@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="jumbotron">
  
     <h1 class="display-4">CREAR NUEVO DISPOSITIVO</h1>
    <br>
    <hr class="my-2">
    <br>
    <p>Para crear un nuevo dispositivo complete los campos del formulario.</p>
  </div>

  
  <form method="POST" action="{{ route('devs.index') }}">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="inputEmail4" name="name">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">ID Dispositivo</label>
      <input type="text" class="form-control" id="inputPassword4" name="dev_id">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword5">MAC ID</label>
      <input type="text" class="form-control" id="inputPassword5" name="mac">
    </div>

  </div>
  
  <button type="submit" class="btn btn-primary">CREAR</button>
</form>


</div>

@endsection
