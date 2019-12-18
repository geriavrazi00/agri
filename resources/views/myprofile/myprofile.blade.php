@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Përditëso të dhënat e mia</h3>
					</div>
				</center>
			</div>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/myprofile/{{$user->id}}">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Emri</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') == null ? $user->name : old('name') }}" required autocomplete="name" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Adresa e-mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') == null ? $user->email : old('email')}}" required autocomplete="email" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Përditëso
                            </button>

                            <a href="/myprofile/password" class="btn btn-primary">
                                Ndrysho fjalëkalimin
                            </a>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
