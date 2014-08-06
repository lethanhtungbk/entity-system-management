@if ($button != null)
<a href="{{URL::to($button->link)}}" class="btn {{$button->style}}">
    @if ($button->icon != '')
    <i class="fa {{$button->icon}}"></i>
    @endif
    {{$button->title}} </a>
@endif