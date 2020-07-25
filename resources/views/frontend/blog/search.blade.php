@extends('frontend.layouts.app')
@section('title','HamroPasal | Blog')
@section('content')
 <!-- Content -->
  <div id="content"> 
    
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Blog</li>
        </ol>
      </div>
    </div>
    
    <!-- Blog -->
    <section class="blog-page padding-top-30 padding-bottom-60">
      <div class="container">
        <div class="row">
          <div class="col-md-9"> 
            @forelse($blogs as $blog)
            <!-- Blog Post -->
            <div class="blog-post">
              <article class="row">
                <div class="col-xs-7"> <img class="img-responsive" src="{{ asset('hamropasal/blog/'.$blog->image) }}" alt="" > </div>
                <div class="col-xs-5"> <span><i class="fa fa-bookmark-o"></i> {{ $blog->created_at->format('m-M-Y')}}</span> <span><i class="fa fa-comment-o"></i> 86 Comments</span> <a href="{{route('blog.show',['slug'=>$blog->slug])}}" class="tittle">{{ $blog->title}} </a>
                  <p>{{ \Illuminate\Support\Str::limit($blog->description, 400, '[...]') }} </p>
                  <a href="{{route('blog.show',['slug'=>$blog->slug])}}">Readmore</a></div>
              </article>
            </div>
            @empty
            <p>No Blog Found</p>
            @endforelse
            
            <!-- pagination -->
            <ul class="pagination">
             {{$blogs->links()}}
            </ul>
          </div>
          
          <!-- Side Bar -->
          <div class="col-md-3">
            <div class="shop-side-bar"> 
              
              <!-- Search -->
              <div class="search">
                <form method="get" action="{{route('blog.search')}}">
                  <label>
                   <input type="text"  name= "query" id = "query" placeholder="Search entire store here..." value="{{ request()->input('query')}}">
                  </label>
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="images/c-img-1.png" alt="" ></li>
          <li><img src="images/c-img-2.png" alt="" ></li>
          <li><img src="images/c-img-3.png" alt="" ></li>
          <li><img src="images/c-img-4.png" alt="" ></li>
          <li><img src="images/c-img-5.png" alt="" ></li>
        </ul>
      </div>
    </section>
    
    <!-- Newslatter -->
    <section class="newslatter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
          </div>
          <div class="col-md-6">
            <form>
              <input type="email" placeholder="Your email address here...">
              <button type="submit">Subscribe!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Content --> 

@endsection