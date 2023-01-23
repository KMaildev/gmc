@include('layouts.includes.css_file')
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="container-xxl flex-grow-1 container-p-y">
    @include('layouts.includes.alert')
    @yield('content')
</div>
