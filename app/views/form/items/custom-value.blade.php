<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}} custom-value-group">
        <input name="{{$field->name}}" type="hidden"/>
        @if ($field->value == '')
        <div class="row custom-value-item">
            <div class="col-md-5">
                <input type="text" class="form-control custom-value-input" data-id="-1" value="" onkeyup="onCustomValueKeyUp(this)"/>
            </div>
            <div class="btn-group tabletools-btn-group col-md-5">
                <a class="btn blue" onclick="onCustomValueAdd(this)"><i class="fa fa-plus"></i></a>
                <a class="btn blue" onclick="onCustomValueRemove(this)"><i class="fa fa-minus"></i></a>
                <a class="btn blue" onclick="onCustomValueUp(this)"><i class="fa fa-arrow-up"></i></a>
                <a class="btn blue" onclick="onCustomValueDown(this)"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        @else
        @foreach ($field->value as $value)
         <div class="row custom-value-item">
            <div class="col-md-5">
                <input type="text" class="form-control custom-value-input" data-id="{{$value->id}}" value="{{$value->value}}" onkeyup="onCustomValueKeyUp(this)"/>
            </div>
            <div class="btn-group tabletools-btn-group col-md-5">
                <a class="btn blue" onclick="onCustomValueAdd(this)"><i class="fa fa-plus"></i></a>
                <a class="btn blue" onclick="onCustomValueRemove(this)"><i class="fa fa-minus"></i></a>
                <a class="btn blue" onclick="onCustomValueUp(this)"><i class="fa fa-arrow-up"></i></a>
                <a class="btn blue" onclick="onCustomValueDown(this)"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        @endforeach
        @endif        
    </div>
</div>