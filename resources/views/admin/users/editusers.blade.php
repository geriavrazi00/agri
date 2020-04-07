@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.edit_user') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/users/{{$user->id}}">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('messages.name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" style="color: black;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') == null ? $user->name : old('name') }}" required autocomplete="name" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('messages.email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="color: black;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') == null ? $user->email : old('email')}}" required autocomplete="email" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @role(App\Constants::ROLE_ADMIN_ID)
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ trans('messages.role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role" required style="border-radius:5px; color: black;" onchange="institutionSelectStatus(this, '{{App\Constants::ROLE_BASIC_USER}}');">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{old('role') == $user->roles[0]->id ? 'selected' : ($role->id == $user->roles[0]->id ? 'selected' : '')}}>
                                            {{ trans($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.institution') }}</label>

                            <div class="col-md-6">
                                <select id="institution" class="form-control" name="institution" {{$user->roles[0]->id != App\Constants::ROLE_BASIC_USER ? 'disabled style="border-radius:5px;"' : "style=border-radius:5px;color:black;"}}>
                                    <option value="">{{trans('messages.no_institution_selected')}}</option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->id}}" {{$user->user_related_id == $institution->id ? 'selected' : ''}}>
                                            {{ trans($institution->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endrole

                    <div class="col-md-12" style="text-align: right;">
                        @can(App\Constants::EDIT_USER)
                            <button type="submit" class="btn btn-success">
                                {{ trans('messages.update') }}
                            </button>
                        @endcan

                        <a href="/users" class="btn btn-primary">
                            {{ trans('messages.back') }}
                        </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
