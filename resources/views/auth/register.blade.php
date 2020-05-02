@extends('layouts.dafreg')

{{-- nama content di layout di dapat dari sini --}}
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">   
            <div class="col-md-4 center col-md-offset-4">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                  
                            <div class="form-group">
                              <label for="name" class="form-control-label">{{ __('Name') }}</label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-control-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="form-control-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                  
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection