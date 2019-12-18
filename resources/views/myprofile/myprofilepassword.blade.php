@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Ndrysho fjalëkalimin tim</h3>
					</div>
				</center>
			</div>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/myprofile/password/save">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Fjalëkalimi i ri</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmimi i fjalëkalimit</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Ruaj
                            </button>

                            <a href="/myprofile" class="btn btn-primary">
                                Ndrysho të dhënat
                            </a>
                        </div>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
