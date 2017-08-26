<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @yield('stylesheet')
  </head>
     <body>
     @include('partials._nav')
          <div class="container">
             

             @include('partials._messages')
             
               {{ Auth::check() ? "Loged In" : "Loged Out" }}
              @yield('content')

                                 
              @include('partials._footer')
              
          </div> <!-- /container -->     

            @include('partials._javascript') 
            @yield('javascript')       
    </body>
</html>