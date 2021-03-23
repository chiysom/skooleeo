<!DOCTYPE html>

<html lang="en">
  <head>
  @include('layouts.head')
  </head>
  <body>
    <div id="app">
      @include('layouts.header')  
      
      @include('layouts.sidebar') 
        
      @section('main-content')
        @show
    </div>

    @include('layouts.footer')
    
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>