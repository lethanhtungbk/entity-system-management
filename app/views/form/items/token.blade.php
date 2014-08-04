@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != '')
        <input type="hidden" class="form-control select2" name='{{$field->name}}' value="{{$field->value}}" id="{{$field->id}}">
        @else
        <input type="hidden" class="form-control select2" name='{{$field->name}}' id="{{$field->id}}">
        @endif
    </div>
</div>
@endif

