@if ($pageMessaegs != null)
@foreach ($pageMessages->messages as $message)
<div class="alert {{$messae->style}} alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    {{$message->title}}
</div>
@endforeach
@endif
