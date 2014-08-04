@if ($portletData != null)
<div class="portlet box {{$portletData->style}}">
    <div class="portlet-title">
        <div class="caption">
            @if ($portletData->title != "")
            <i class="fa {{$portletData->icon}}"></i> {{$portletData->title}}
            @else
            {{$portletData->title}}
            @endif
        </div>        
    </div>
    <div class="portlet-body form">
        @include('form.form',array('formData' => $portletData->content))
    </div>
</div>
@endif