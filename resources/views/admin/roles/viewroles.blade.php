@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.view_role') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.name') }}</label>

                    <div class="col-md-6">
                        <label id="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ $role->name }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.permissions') }}</label>

                    <div id="permissions" class="col-md-6" style="height: 200px; overflow: auto; padding: 10px;">
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label">{{ trans('messages.' . $v->name) }}</label>
                                <br/>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-12" style="text-align: right;">
                    @can(App\Constants::EDIT_ROLE)
                        <a href="/roles/{{$role->id}}/edit" class="btn btn-success">
                            {{ trans('messages.edit') }}
                        </a>
                    @endcan

                    @can(App\Constants::DELETE_ROLE)
                        <form method="POST" action="/roles/{{$role->id}}" style="display:inline; margin:0px; padding:0px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                                {{ trans('messages.delete') }}
                            </button>
                        </form>
                    @endcan

                    <a href="/roles" class="btn btn-primary">
                        {{ trans('messages.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
