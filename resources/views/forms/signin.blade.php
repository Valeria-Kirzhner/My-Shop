@extends('main')
@section('about') 
<div class="row">
    <div class="col-md-12">
        <h1>Here you can sign in with your account </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="" method="POST">
            {{csrf_field()}}
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" value="{{ old('email')}}" type="text" class="form-control" id="email" aria-describedby="email" placeholder="alex@gmail.com">
              <span class="text-danger">{{$errors->first('email')}}</span>
            </div>
              <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input name="password" type="text" class="form-control" placeholder="password" id="password" aria-describedby="email">
                <span class="text-danger"> {{$errors->first('password')}}</span>
            </div>
              <input class="btn btn-primary " type="submit" name="submit" value="Sign In" id="">
        </form>
    </div>
</div>
@endsection