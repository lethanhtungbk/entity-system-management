@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">        
        <textarea type="text" class="form-control" name='{{$field->name}}' >{{$field->value}}</textarea>        
    </div>
</div>
@endif