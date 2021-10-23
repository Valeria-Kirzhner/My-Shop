<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY SHOP | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script> var BASE_URL= "{{ url('')}}";</script>
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('cms/dashboard')}}">MY SHOP admin panel</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap d-flex flex-row-reverse">
              <a target="blank" class="nav-link px-3" href="{{ url('')}}">Back to site</a>
            <a target="blank" class="nav-link px-3" href="{{ url('user/logout')}}">Logout</a>
      </div>
    </div>
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('cms/dashboard')}}">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('cms/menu')}}">
                <span data-feather="file"></span>
                Menu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('cms/content')}}">
                <span data-feather="layers"></span>
                Content
              </a>
            </li>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('cms/categories')}}">
              <span data-feather="layers"></span>
              Categories
            </a>
          </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('cms/products')}}">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('cms/orders')}}">
                <span data-feather="bar-chart-2"></span>
                Orders
              </a>
            </li>

          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        
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
        @yield('cms_content')
      </main>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script rel="javascript" src="{{ asset('js/script.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dashboard.js')}}"></script>

</body>

</html>