
@extends('layouts.app')

@section('content')

    <div class="container">
      <div style="height:50px"></div>
      <h1>Pedido</h1>

      <p>Detalles de tu pedido</p>
      <a class="btn btn-default"  href="{{ asset('/Evento/index') }}">Atras</a>
      <hr>



      <div class="col-md-6">
        {{-- <form action="{{ asset('/Evento/create/') }}" method="post"> --}}
          <div class="fomr-group">
            <h4>Producto</h4>
            {{ $event->producto->nombre_prod }}
          </div>
          <div class="fomr-group">
            <h4>Fecha pedido</h4>
            {{ $event->fecha }}
          </div>
          <div class="fomr-group">
            <h4>Unidades</h4>
            {{ $event->unidades }}
          </div>
          <div class="fomr-group">
            <h4>Precio</h4>
            {{ $event->precio }}
          </div>
          <br>
          <a class="btn btn-info" href=" {{ asset('/Evento/index/') }} ">Aceptar</a>
        {{-- </form> --}}
      </div>


      <!-- inicio de semana -->


    </div> <!-- /container -->

@endsection
