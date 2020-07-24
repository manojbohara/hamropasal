@extends('frontend.layouts.app')
@section('title','HamroPasal | Login')
@section('content')
  <!-- Content -->
  <div id="content"> 
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <!-- Linking -->
    <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Authentication</li>
        </ol>
      </div>
    </div>
    
    <!-- Blog -->
    <section class="login-sec padding-top-30 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> 
            <!-- Login Your Account -->
            <h5>{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }} Account</h5>
            
            <!-- FORM -->
            @isset($url)
            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
              @else
             <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @endisset
               @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </li>
                <li class="col-sm-12">
                 <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>	
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                       </span>
                     @enderror
                </li>
                <li class="col-sm-6">
                  <div class="checkbox checkbox-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                  </div>
                </li>
                 @if (Route::has('password.request'))
                   <a class="forget" href="{{ route('password.request') }}">
                     {{ __('Forgot Your Password?') }}
                    </a>
                   @endif
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">
                     {{ __('Login') }}
                   </button>
                </li>
              </ul>
            </form>
          </div>
          
          <!-- Don’t have an Account? Register now -->
          <div class="col-md-6">
            <h5>Don’t have an Account? Register now</h5>
            
            <!-- FORM -->
              @isset($url)
               <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
               @else
              <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
               @endisset
               @csrf
              <ul class="row">
                <li class="col-sm-12">
                  <label>{{ __('Name') }}
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>{{ __('E-Mail Address') }}
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                     <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>{{ __('Password') }}
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                      </span>
                     @enderror
                  </label>
                </li>
                 <li class="col-sm-12">
                  <label>{{ __('Confirm Password') }}
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </label>
                </li>
                <li class="col-sm-12 text-left">
                  <button type="submit" class="btn-round">{{ __('Register') }}</button>
                </li>
              </ul>
            </form>
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