@extends('admin')

@section('content')

<div class="form-group dynamic-element" style="display:none">
    <div class="row">


    <!-- Replace these fields -->

        <div class="form-group col-sm-3">
            <label class="col-sm-12 text-end control-label col-form-label">Multiple Select</label>
    <div class="col-md-12">
        <select class="select2 select2-container select2-container--default select2-container--below select2-container--focus select2-container--open"
            style="width: 100%;" name="producto_id[]">
            <optgroup label="Productos">
                @foreach ($productos  as $producto)
                <option value="{{$producto->id}}">{{$producto->nombre_prod}}</option>
                @endforeach

            </optgroup>

        </select>
    </div>

        </div>
        <div class="form-group col-sm-3">
            <label class="col-sm-12 text-end control-label col-form-label">Fecha Inicio</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" name="fecha_ini[]"
                    placeholder=" ">
            </div>
        </div>


        <div class="form-group col-sm-3">
            <label class="col-sm-12 text-end control-label col-form-label">Fecha Fin</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" name="fecha_fin[]"
                    placeholder=" ">
            </div>
        </div>

        <div class="form-group col-sm-3">
            <label class="col-sm-12 text-end control-label col-form-label">Precio</label>
            <div class="col-sm-12">
                <input   type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
                name="precio[]" class="form-control"
                    placeholder=" ">
            </div>
        </div>
      <!-- End of fields-->
      <div class="col-md-1">
        <p class="delete">X</p>
      </div>
    </div>
  </div>
  <!-- END OF HIDDEN ELEMENT -->





  <div class="form-container">
    <form class="form-horizontal" action="{{route('productotarifa.store')}}" method="POST">

    <fieldset>
    <!-- Form Name -->
    <legend class="title">Tarifas</legend>

    <div class="dynamic-stuff">
      <!-- Dynamic element will be cloned here -->
      <!-- You can call clone function once if you want it to show it a first element-->
    </div>

    <!-- Button -->
    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
            <p class="add-one">+ Añadir Tarifa</p>
        </div>
      <div class="col-md-5"></div>
        <div class="col-md-6">
          <button id="singlebutton" name="" class="btn btn-primary">Guardar Tarifas</button>
        </div>
      </div>
    </div>
  </fieldset>
  @csrf
  </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
//Clone the hidden element and shows it
$(document).ready(function(){
    $('.add-one').click(function(){
    $('.dynamic-element').first().clone().appendTo('.dynamic-stuff').show();
    attach_delete();
    });


    //Attach functionality to delete buttons
    function attach_delete(){
    $('.delete').off();
    $('.delete').click(function(){
        console.log("click");
        $(this).closest('.form-group').remove();
    });
    }
});
</script>
@endsection
