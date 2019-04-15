<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.header')
<body>
    <div id="app" class="vue-app">
        @include('shared/nav')
        <main class="py-4">
            @include('shared/alerts')
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>
</html>
