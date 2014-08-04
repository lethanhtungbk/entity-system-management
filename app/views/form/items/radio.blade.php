@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != null && is_array($field->value))
        @foreach ($field->value as $key => $value)
        <div class="radio-list">
            @if ($field->selected==$key)
            <label><input type="radio" name="{{$field->name}}" value="{{$key}}" checked> {{$value}}</label>
            @else
            <label><input type="radio" name="{{$field->name}}" value="{{$key}}"> {{$value}}</label>
            @endif            
        </div>
        @endforeach
        @endif        
    </div>
</div>
@endif