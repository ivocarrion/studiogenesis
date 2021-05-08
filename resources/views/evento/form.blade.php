
@extends('layouts.app')

@section('content')

    <div class="container">
      <div style="height:50px"></div>
      <h1>Crear Pedido </h1>
      <p class="lead">

      <p>Realiza tu pedido y guárdalo en el calendario</p>
      <a class="btn btn-default"  href="{{ asset('/Evento/index') }}">Atras</a>
      <hr>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif


      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
          @csrf
        <input type="text" hidden value="{{auth()->id()}}" name="user">
          <div class="fomr-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha">
          </div>
            <div class="form-group">
                <label class="col-sm-12 text-end control-label col-form-label">Producto</label>

                    <select class="select2 select2-container"
                        style="width: 100%;" name="producto_id">
                        <optgroup label="Productos">
                            @foreach ($productos  as $producto)
                            <option value="{{$producto->id}}">{{$producto->nombre_prod}}</option>
                            @endforeach
                        </optgroup>
                    </select>

            </div>
          <div class="fomr-group">
            <label>Unidades</label>
            <input type="number" class="form-control" name="unidades">
          </div>

          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
      </div>


      <!-- inicio de semana -->


    </div> <!-- /container -->

 @endsection
