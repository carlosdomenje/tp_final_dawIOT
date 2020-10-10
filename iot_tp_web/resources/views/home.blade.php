@extends('layouts.app')

@section('content')

<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">DISPOSITIVOS</h3>   
                <div class="ml-4 text-lg leading-7 font-semibold"></div>
  
                <a class="btn btn-primary" href="{{ route('devs.add') }}" role="button">AGREGAR DISPOSITIVO</a>        
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>MAC Address</th>
                    <th>Fecha de Creacion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($devices as $devicesItem)
                  <tr>            
                    <td>                    
                    <i class="fas fa-arrow-up"></i> {{ $devicesItem->name}}
                    </td>
                    <td>{{ $devicesItem->mac}}</td>
                    <td>                     
                    {{ $devicesItem->created_at}}
                    </td>
                    <td>
                      <a href="{{ route('devs.edit', $devicesItem)}}" class="text-muted" style="padding: 20px" >
                        <i class="fas fa-edit fa-2x " style="color:blue"></i>
                      </a>
                      <div>
                      <form method= "POST" action="{{ route('devs.destroy', $devicesItem)}}">
                        @csrf @method('DELETE')
                        <a class="btn btn-danger" type="submit" >
                            <i class="icon-trash icon-large"></i> Delete</a>
                      </a>
                      </form>
                      </div>
                      <a href="{{ route('devs.show', $devicesItem)}}" class="text-muted" style="padding: 20px">
                        <i class="fas fa-chart-bar fa-2x" style="color:green"></i>
                      </a>
                    </td>
                    </tr>
                  @empty
                    <td>No hay dispositivos para mostrar</td>   
                  
                  @endforelse                   
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
         
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
@endsection
