
@extends('main')


@section('title', '| Home')

@section('content')
          <!-- Main component for a primary marketing message or call to action -->
          <div class="jumbotron">
                  <h1>Navbar example</h1>
                  <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                  <p>
                    <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
                  </p>
          </div>

    

    <div class="row">
      <div class="col-md-8">

      @foreach($posts as $post)
        
      
        <div class="post" style="padding: 10px">
          
          <h1> {{ $post->title }} </h1>

          <p> {{ substr($post->body , 0, 250)}}{{ strlen($post->body) > 250 ? "..."  : " "}} </p>

          <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary btn-lg"> Read More</a>

        </div>

      @endforeach
      </div>

      <div class="Sidebar">
        <div class="CurrentPost">
          <h1>Sidebar</h1>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has </p>
        </div>
      </div>


   </div>

@endsection('content')

      

   



  