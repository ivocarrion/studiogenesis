<div class="form-group row">
    <label class="col-md-3 mt-3">Multiple Select</label>
    <div class="col-md-9">
        <select class="select2 select2-container select2-container--default select2-container--below select2-container--focus select2-container--open" multiple="multiple"
            style="width: 100%;" name="categoria[]">
            <optgroup label="Categorías">
                @foreach ($categorias  as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre_cat}}</option>
                @endforeach

            </optgroup>


        </select>
    </div>
</div>

