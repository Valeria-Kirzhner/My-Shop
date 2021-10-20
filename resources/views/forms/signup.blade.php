@extends('main')
@section('about') 
<div class="row">
    <div class="col-md-12">
        <h1>Here you can sign up for your account</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" value="{{ old('name')}}" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Alex">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" value="{{ old('email')}}" type="text" class="form-control" id="email" aria-describedby="email" placeholder="alex@gmail.com">
            </div>
              <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input name="password" type="text" class="form-control" placeholder="password" id="password" aria-describedby="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="text" class="form-control" placeholder="password" id="password-confirmation" aria-describedby="password-confirmation">
            </div>
              <input class="btn btn-primary " type="submit" name="submit" value="Sign Up" id="">
        </form>
    </div>
</div>
@endsection