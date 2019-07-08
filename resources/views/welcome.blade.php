@extends('layouts.primary')

@section('title')
    Home
@endsection

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="identity text-center">
        <div class="text-content">
              <h1 class=""> Quixone </h1>
              <h5 class="">Pick Three Topics Now To Win Instantly.</h5>
              
        </div>
      </div>
      
      
    </section>
    <!-- /.content -->
  
  
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-center m-auto" id="testimonialSlider">
          <h2>Testimonials</h2>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            @if($testimonies->count())
            <ol class="carousel-indicators">
                @for ($i = 0; $i < $testimonies->count(); $i++)
                    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active" {{ $j = 0 }}></li>
                @endfor
            </ol>   
            
            <div class="carousel-inner">
              
                @foreach ($testimonies as $testimony)
                    <!-- Wrapper for carousel items -->  
                    <div class="item carousel-item {{ !$j ? 'active' : ''}}">
                        @if($testimony->user->avatar)
                            <div class="img-box"><img src="{{ asset('dist/img/' . $testimony->user->avatar) }}" alt="avatar"></div>
                        @else
                            <div class="img-box"><img src="{{ asset('dist/img/avatar.png') }}" alt="avatar"></div>
                        @endif
                        <p class="testimonial" {{ $j = $j + 1 }}>{{ $testimony->body }}</p>
                        <p class="overview"><b>{{ $testimony->user->name }}</b>, {{ $testimony->user->username }}</p>
                    </div>
                @endforeach
              
            </div>
            

            <!-- Carousel controls -->
            <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          @else
          <h4 class="text-center">No testimonies yet!</h4>
          <br>
          @endif

        </div>
      </div>
    </div>
    
@endsection