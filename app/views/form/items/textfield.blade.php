@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != '')
        <input type="text" class="form-control" name='{{$field->name}}' value="{{$field->value}}"/>
        @else
        <input type="text" class="form-control" name='{{$field->name}}' />
        @endif        
    </div>
</div>
@endif