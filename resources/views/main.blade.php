<!doctype html>
<html lang="en">
<head>
    @include('partials._header')
    
</head>

  <body>
    @include('partials._nav')
    <div class="container mt-3">
        @include('partials._messages')
        @yield('content')

        @include('partials._footer')
    </div>
 
        @include('partials._javascript')  

        @yield('javascrpt')
  </body>
</html>