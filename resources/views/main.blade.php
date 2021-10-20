<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script> var BASE_URL= "{{ url('')}}";</script>
<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('') }}">MY SHOP </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('about') }}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('shop') }}">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('shop/checkout') }}">
                  <img width="20" src="{{ asset('images/shopping-cart.png')}}" alt="">
                  @if( ! Cart::isEmpty())
                  <div class="total-cart">{{ Cart::getTotalQuantity()}}</div>
                  @endIf
                </a>
              </li>
          </ul>
          <ul class="navbar-nav navbar-right">
              @if( ! Session::has('user_id'))
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/signin') }}">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/signup') }}">Sign Up</a>
              </li> 
              @else
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/profile') }}">{{Session::get('user_name')}}</a>
              </li>
              @if(Session::has('is_admin'))
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('cms/dashboard') }}">CMS dashboard</a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/logout') }}">Logout</a>
              </li>
              @endif
          </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <br>
      <div class="container">
        @if(Session::has('sm'))
        <div class="row sm-box">
          <div class="col-md-12">
            <div class="alert alert-success">{{Session::get('sm')}}</div>
          </div>
        </div>
        @endIf
            @if ($errors->any())
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error) 
                        <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              @endif
        @yield('home') 
        @yield('about') 
      </div>
      <br>
    </main>
    <br>
    <hr>
    <footer>
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">My-Shop &copy; {{date('Y')}}</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script rel="javascript" src="{{ asset('js/script.js')}}" type="text/javascript"></script>
</body>

</html>