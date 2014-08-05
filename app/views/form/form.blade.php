@if ($formData != null)
{{ Form::open(array('url' => URL::to($formData->url),'class' => $formData->class , 'method' => $formData->method)) }}
<div class="form-body">
    @foreach ($formData->formItems as $field)
    @include($field->ui,array('field' => $field))
    @endforeach   

    <div class="form-group">
        <label class="control-label col-md-4">Test token</label>
        <div class="col-md-5">        
            <input type="text" class="token-input" autocomplete="off" id="tokenfield-2-tokenfield" >
        </div>
    </div>
</div>
<div class="form-actions fluid">

</div>
{{Form::close()}}
@endif