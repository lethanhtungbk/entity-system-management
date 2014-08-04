@if ($formData != null)
{{ Form::open(array('url' => URL::to($formData->url),'class' => $formData->class , 'method' => $formData->method)) }}
<div class="form-body">
    @foreach ($formData->formItems as $field)
    @include($field->ui,array('field' => $field))
    @endforeach   
</div>
<div class="form-actions fluid">
    
</div>
{{Form::close()}}
@endif