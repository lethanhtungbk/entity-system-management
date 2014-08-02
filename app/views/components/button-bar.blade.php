@if ($buttonBar != null)
<div class="row">
    <div class="col-md-12">
        @if (count($buttonBar->leftButtons) > 0)
        <div class="btn-group tabletools-btn-group">
            @foreach ($buttonBar->leftButtons as $button)
            <a href="{{URL::to($button->link)}}" class="btn {{$button->style}}">
                @if ($button->icon != '')
                <i class="fa {{$button->icon}}"></i>
                @endif
                {{$button->title}} </a>
            @endforeach
        </div>
        @endif
        @if (count($buttonBar->rightButtons) > 0)
        <div class="btn-group tabletools-btn-group pull-right">
            @foreach ($buttonBar->rightButtons as $button)
            <a href="{{URL::to($button->link)}}" class="btn {{$button->style}}">
                @if ($button->icon != '')
                <i class="fa {{$button->icon}}"></i>
                @endif
                {{$button->title}} </a>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endif