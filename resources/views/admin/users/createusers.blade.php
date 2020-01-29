@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">Krijo një përdorues</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/users">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">Emri</label>

                        <div class="col-md-6">
                            <input id="name" type="text" style="color: black;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">Adresa e-mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="color: black;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black;">Fjalëkalimi</label>

                        <div class="col-md-6">
                            <input id="password" type="password" style="color: black;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: black;">Konfirmimi i fjalëkalimit</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" style="color: black;" class="form-control" name="password_confirmation" required autocomplete="new-password" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right" style="color: black;">Roli</label>

                        <div class="col-md-6">
                        	<select id="role" class="form-control" name="role" required style="border-radius: 5px; color: black;">
                        		@foreach($roles as $role)
                        			<option value="{{$role->id}}" {{old('role') == $role->id ? 'selected' : ''}}>
                        				{{$role->name}}
                        			</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>

                    <div class="col-md-12" style="text-align: right;">
                        <button type="submit" class="btn btn-success">
                            Krijo
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-primary">
                            Kthehu
                        </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
