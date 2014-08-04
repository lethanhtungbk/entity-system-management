@if ($field != null)
<div class="form-group">
    @include('form.items.form-description')
    <div class="{{$field->inputStyle}}">
        @if ($field->value != null && is_array($field->value))
        <select class="form-control" name='{{$field->name}}' multiple>
        @foreach ($field->value as $key => $value)
            @if ($field->selected != null)
                @if (is_array($field->selected)) 
                    @if (in_array($key,$field->selected))
                        <option value='{{$key}}' selected="true">{{$value}}</option>
                    @else
                        <option value='{{$key}}'>{{$value}}</option>
                    @endif
                @else
                    @if ($field->selected==$key)
                        <option value='{{$key}}' selected="true">{{$value}}</option>
                    @else
                        <option value='{{$key}}'>{{$value}}</option>
                    @endif                    
                @endif
            @else
                <option value='{{$key}}'>{{$value}}</option>
            @endif            
            @endforeach
        </select>        
        @endif
    </div>
</div>
@endif