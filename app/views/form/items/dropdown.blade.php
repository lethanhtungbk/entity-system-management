@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        <select class="form-control" name='{{$field->name}}' id="{{$field->id}}">
            @if ($field->value != null && is_array($field->value))
            @foreach ($field->value as $key => $value)
            @if ($field->selected==$key)
            <option value='{{$key}}' selected="true">{{$value}}</option>
            @else
            <option value='{{$key}}'>{{$value}}</option>
            @endif
            @endforeach
            @endif        
        </select>                
    </div>
</div>
@endif