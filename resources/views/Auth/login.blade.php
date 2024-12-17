@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Login</h1>
                        @if (Session::has('error'))
                            <p class="text-danger">
                                {{ Session::get('error') }}
                            </p>
                        @endif
                        @if (Session::has('success'))
                            <p class="text-success">
                                {{ Session::get('success') }}
                            </p>
                        @endif
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter Email" />
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter Password" />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="row">
                                {{-- <div class="col-8 text-left">
                                    <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Password?</a>
                                </div> --}}
                                <div class="col-4 text-right">
                                    <input type="submit" value="Login" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
