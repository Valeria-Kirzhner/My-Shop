<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/signin') }}">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('user/signup') }}">Sign Up</a>
              </li> 
          </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <br>
      <div class="container">
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
    <script src="{{ asset('js/script.js')}}" type="text/javascript"></script>

</body>

</html>