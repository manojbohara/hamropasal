@extends('frontend.layouts.app')
@section('title',$blog->title)
@section('content')
  <!-- Content -->
  <div id="content"> 
    
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{ route('blog.index')}}">Blog</a></li>
          <li class="active">{{ $blog->title}}</li>
        </ol>
      </div>
    </div>
    @if(session('success'))
     <div class="alert alert-success">
        {{session('success')}}
    </div>
   @endif
    <!-- Blog -->
    <section class="blog-single padding-top-30 padding-bottom-60">
      <div class="container">
        <div class="row">
          <div class="col-md-9"> 
            
            <!-- Blog Post -->
            <div class="blog-post">
              <article> 
                <img class="img-responsive margin-bottom-20" src="{{ asset('hamropasal/blog/'.$blog->image) }}" alt="" >
                <span><i class="fa fa-bookmark-o"></i> 
                {{ $blog->created_at->format('m M ,Y')}}</span> 
                <span><i class="fa fa-comment-o"></i> 86 Comments</span>
                <h5>{{ $blog->title}} </h5>
                <p>{{ $blog->description }}</p>
              </article>
              <!-- Comments -->
              <div class="comments">
                <h6 class="margin-0">Comments ({{$blog->blogcomments->count()}})</h6>
                <ul>
                  @foreach($blog->blogcomments as $comment)
                  <!-- Comments -->
                  <li class="media">
                    <div class="media-left"> <a href="#" class="avatar"> <img src="/frontend/images/avatar.jpg" alt=""> </a> </div>
                    <div class="media-body padding-left-20">
                      <h6>{{Auth::user() ? Auth::user()->name : $comment->name}}<span><i class="fa fa-bookmark-o"></i> {{ $blog->created_at->format('m M ,Y')}} </span> </h6>
                      <p>{{$comment->message}}</p>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>

              
              <!-- ADD comments -->
              <div class="add-comments padding-top-20">
                <h6>Leave a Comment</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- FORM -->
                <form method="post" action="{{route('blogComment.store')}}">
                  @csrf
                  <ul class="row">
                    <input type="hidden" name="blog_id" class="form-control" value="{{$blog->id}}">
                    <li class="col-sm-6">
                      <label>Name
                        <input type="text" class="form-control" name="name" placeholder="" value="{{Auth::user() ? Auth::user()->name : ''}}">
                      </label>
                    </li>
                    <li class="col-sm-6">
                      <label>Email
                        <input type="text" class="form-control" name="email" placeholder="" value="{{Auth::user() ? Auth::user()->email : ''}}">
                      </label>
                    </li>
                    <li class="col-sm-12">
                      <label>Message
                        {!! Form::textarea('message', null, array('placeholder' => 'Enter Your Message','class' => 'form-control','cols' => 2, 'rows' =>2,)) !!}
                      </label>
                    </li>
                    <li class="col-sm-12 text-left">
                      <button type="submit" class="btn-round">Send Message</button>
                    </li>
                  </ul>
                </form>
              </div>
            </div>
          </div>
          
          <!-- Side Bar -->
          <div class="col-md-3">
            <div class="shop-side-bar"> 
              
              <!-- Search -->
              <div class="search">
                <form method="get" action="{{route('blog.search')}}">
                  <label>
                    <input type="text"  name= "query" id = "query" placeholder="Search entire blog here..." value="{{ request()->input('query')}}">
                  </label>
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
              <!-- Recent Posts -->
              <h6>Recent Posts</h6>
              <div class="recent-post"> 
                @foreach($blogs as $blog)
                <!-- Recent Posts -->
                <div class="media">
                  <div class="media-left"> <a href="#."><img class="img-responsive" src="{ asset('hamropasal/blog/'.$blog->image) }}" alt=""> </a> </div>
                  <div class="media-body"> <a href="#.">{{ $blog->title}} </a> <span>{{ $blog->created_at->format('m M ,Y')}} </span><span> 86 Comments</span> </div>
                </div>
                @endforeach
                
              </div>
              
              <!-- Quote of the Day -->
              <h6>Quote of the Day</h6>
              <div class="quote-day"> <i class="fa fa-quote-left"></i>
                <p>Suspendisse sodales cursus lorem vel
                  efficitur. Donec tincidunt aliquet lacus. Maecenas pulvinar egestas ex eget eleifend. Aenean eget tempus urna [...]</p>
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