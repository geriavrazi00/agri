@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.view_user') }}</h3>
                </div>
            </center>

			<div class="table card-body" style="background-color: white;">
                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-right">{{ trans('messages.name') }}</label>
                    <label id="name" class="col-md-7 col-form-label">{{$user->name}}</label>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-5 col-form-label text-md-right">{{ trans('messages.email') }}</label>
                    <label id="email" class="col-md-7 col-form-label">{{$user->email}}</label>
                </div>

                @role(App\Constants::ROLE_ADMIN_ID)
                    <div class="form-group row">
                        <label for="role" class="col-md-5 col-form-label text-md-right">{{ trans('messages.role') }}</label>
                        <label id="role" class="col-md-7 col-form-label">{{ trans('messages.' . $user->roles[0]->name) }}</label>
                    </div>
                    @if($user->roles[0]->id == App\Constants::ROLE_BASIC_USER)
                        <div class="form-group row">
                            <label for="institution" class="col-md-5 col-form-label text-md-right">{{ trans('messages.institution') }}</label>
                            <label id="institution" class="col-md-7 col-form-label">{{ $user->user_related_id == null ? '-' : App\User::find($user->user_related_id)->name }}</label>
                        </div>
                    @endif
                @endrole

                <div class="col-md-12" style="text-align: right;">
                    @can(App\Constants::EDIT_USER)
                        <a href="/users/{{$user->id}}/edit" class="btn btn-success">
                            {{ trans('messages.edit') }}
                        </a>
                    @endcan

                    @can(App\Constants::USER_PASSWORD)
                        <a href="/users/{{$user->id}}/password" class="btn btn-info">
                            {{ trans('messages.change_password') }}
                        </a>
                    @endcan

                    @can(App\Constants::DELETE_USER)
                        <form method="POST" action="/users/{{$user->id}}" style="display:inline; margin:0px; padding:0px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                                {{ trans('messages.delete') }}
                            </button>
                        </form>
                    @endcan

                    <a href="/users" class="btn btn-primary">
                        {{ trans('messages.back') }}
                    </a>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
