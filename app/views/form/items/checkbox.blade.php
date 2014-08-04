@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != null && is_array($field->value))
        @foreach ($field->value as $key => $value)
        <div>
            @if ($field->selected != null && is_array($field->selected) && in_array($key,$field->selected))
            <input type="checkbox" name="{{$field->name}}" value='{{$key}}' checked="true">{{$value}}</option>
            @else
            <input type="checkbox" name="{{$field->name}}" value='{{$key}}' >{{$value}}</option>
            @endif
        </div>
        @endforeach
        @endif        
    </div>
</div>
@endif
