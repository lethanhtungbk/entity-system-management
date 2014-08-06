@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != '')
        <input type="text" class="token-input" autocomplete="off" id="{{$field->id}}" value="{{$field->value}}">
        @else
        <input type="text" class="token-input" autocomplete="off" id="{{$field->id}}" value="{{$field->value}}">
        @endif
    </div>
</div>
@endif

