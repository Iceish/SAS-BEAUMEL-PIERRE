@php
    $url = explode('/',url()->current());
    array_pop($url);
    $url = implode('/', $url);
@endphp
<a class="btn" href="{{ $url }}">{{ucfirst(__('cancel'))}}</a>
