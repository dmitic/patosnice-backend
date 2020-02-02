@extends('layouts.login.app_login')

	@section('content')
	<div class="account-container">
		<div class="content clearfix">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<h1>Logovanje</h1>
				<div class="login-fields">
					<p>Unesite podatke za logovanje</p>
					<div class="field">
						<label for="email">{{ __('Email adresa') }}</label>
						<input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Unesite email"
							class="login username-field @error('email') is-invalid @enderror" />
							@error('email')
                <p class="help-block"><small>{{ $message }}</small></p>
              @enderror

					</div> <!-- /field -->
					<div class="field">
						<label for="password">{{ __('Šifra') }}</label>
						<input type="password" id="password" name="password" placeholder="Šifra"
							class="login password-field @error('password') is-invalid @enderror" required
							autocomplete="current-password" />
							@error('password')
                <p class="help-block"><small>{{ $message }}</small></p>
              @enderror
					</div> <!-- /password -->
				</div> <!-- /login-fields -->
				<div class="login-actions">
					<button type="submit" class="button btn btn-success btn-large">{{ __('Log in') }}</button>
				</div> <!-- .actions -->
			</form>

		</div> <!-- /content -->

	</div> <!-- /account-container -->

	@endsection