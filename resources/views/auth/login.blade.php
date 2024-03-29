@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="row justify-content-center">
        <div class="col-md-8-login">
            <form method="POST" action="{{ route('login') }}" style="width: 100%;">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Adresa e-mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Fjalëkalimi</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" oninvalid="createInvalidMsg(this, '{{trans('validation.password_required')}}', '');" oninput="createInvalidMsg(this, '', '');">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-6">
                        <button type="submit" class="btn btn-primary">
                            Kyçu
                        </button>

                        <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
