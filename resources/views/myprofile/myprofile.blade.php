@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">

            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.update_data') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/myprofile/{{$user->id}}">
                    @method('PUT')
                    @csrf

                    <div class="form-group row" style="padding-top: 10px;">
                        <label for="name" class="col-md-4 text-md-right" style="color: black; top: 12px;">{{ trans('messages.name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" style="color: black;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') == null ? $user->name : old('name') }}" required autocomplete="name" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" style="padding-top: 10px;">
                        <label for="email" class="col-md-4 text-md-right" style="color: black; top: 12px;">{{ trans('messages.email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="color: black;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') == null ? $user->email : old('email')}}" required autocomplete="email" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12" style="text-align: right;">
                        <button type="submit" class="btn btn-success">
                            {{ trans('messages.update') }}
                        </button>

                        <a href="/myprofile/password" class="btn btn-info">
                            {{ trans('messages.change_password') }}
                        </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
