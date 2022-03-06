@php
    $url = explode('/',url()->current());
    array_pop($url);
    $url = implode('/', $url);
@endphp
<a class="backBtn" href="{{ $url }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
