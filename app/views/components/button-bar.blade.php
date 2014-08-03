<<<<<<< HEAD
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
=======
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

>>>>>>> fb461793d581aa5af0edaa76cb054438c0c7a9dc
