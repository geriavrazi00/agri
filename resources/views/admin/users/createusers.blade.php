@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.create_user') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/users">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.name') }}</label>

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
                        <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.email') }}</label>

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
                        <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.password') }}</label>

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
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.password_confirmation') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" style="color: black;" class="form-control" name="password_confirmation" required autocomplete="new-password" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">
                        </div>
                    </div>

                    @role(App\Constants::ROLE_ADMIN_ID)
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role" required style="border-radius: 5px; color: black;" onchange="institutionSelectStatus(this, '{{App\Constants::ROLE_BASIC_USER}}');">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{old('role') == $role->id ? 'selected' : ''}}>
                                            {{ trans($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.institution') }}</label>

                            <div class="col-md-6">
                                <select id="institution" class="form-control" name="institution" style="border-radius: 5px;" disabled>
                                    <option value="">{{trans('messages.no_institution_selected')}}</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->id}}" {{old('institution') == $institution->id ? 'selected' : ''}}>
                                            {{ trans($institution->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endrole

                    <div class="col-md-12" style="text-align: right;">
                        @can(App\Constants::CREATE_USER)
                            <button type="submit" class="btn btn-success">
                                {{ trans('messages.create') }}
                            </button>
                        @endcan

                        <a href="{{ url()->previous() }}" class="btn btn-primary">
                            {{ trans('messages.back') }}
                        </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
