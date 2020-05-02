@extends('layouts.daflog')

{{-- nama content di layout di dapat dari sini --}}
@section('content')
<div class="content">
	<div class="header">
		<div class="logo text-center"><img src="{{asset('assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div>
		<p class="lead">Login to your account</p>
	</div>
    <form class="form-auth-small" action="{{ route('login') }}" method="POST">
        @csrf
        
		<div class="form-group">
			<label for="signin-email" class="control-label sr-only">{{ __('E-Mail Address') }}</label>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group">
			<label for="signin-password" class="control-label sr-only">{{ __('Password') }}</label>
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group clearfix">
			<label class="fancy-checkbox element-left">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<span>{{ __('Remember Me') }}</span>
			</label>
		</div>

		<button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
        
        @if (Route::has('password.request'))
        <div class="bottom">
			<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
        </div>
        @endif
        
	</form>
</div>
@endsection