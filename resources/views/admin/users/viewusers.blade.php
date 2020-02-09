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

                <div class="form-group row">
                    <label for="role" class="col-md-5 col-form-label text-md-right">{{ trans('messages.role') }}</label>
                    <label id="role" class="col-md-7 col-form-label">{{ trans($user->role->name) }}</label>
                </div>

                <div class="col-md-12" style="text-align: right;">
                    <a href="/users/{{$user->id}}/edit" class="btn btn-success">
                        {{ trans('messages.edit') }}
                    </a>
                    <a href="/users/{{$user->id}}/password" class="btn btn-info">
                        {{ trans('messages.change_password') }}
                    </a>
                    <form method="POST" action="/users/{{$user->id}}" style="display:inline; margin:0px; padding:0px;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                            {{ trans('messages.delete') }}
                        </button>
                    </form>
                    <a href="/users" class="btn btn-primary">
                        {{ trans('messages.back') }}
                    </a>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
