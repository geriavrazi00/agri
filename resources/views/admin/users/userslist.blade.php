@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
        <div class="col-md-7" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.users_management') }}</h3>

                    @can(App\Constants::CREATE_USER)
                        <a href="/users/create" class="btn btn-primary navbar-btn ml-0 ml-lg-3" style="height: fit-content;">
                            {{ trans('messages.create') }}
                        </a>
                    @endcan
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <table id="userstable" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">{{ trans('messages.name') }}</th>
                            <th class="resulttablehead">{{ trans('messages.email') }}</th>
                            @role(App\Constants::ROLE_ADMIN_ID)
                                <th class="resulttablehead">{{ trans('messages.role') }}</th>
                            @endrole
                            <th class="resulttablehead" style="text-align: center;">{{ trans('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{$user->name}}</td>
                                <td class="resulttabledata">{{$user->email}}</td>
                                @role(App\Constants::ROLE_ADMIN_ID)
                                    <td class="resulttabledata">{{ trans('messages.' . $user->roles[0]->name) }}</td>
                                @endrole
                                <td class="resulttabledata" style="text-align: center;">
                                    <a href="/users/{{$user->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.details') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @can(App\Constants::EDIT_USER)
                                        <a href="/users/{{$user->id}}/edit" class="btn btn-success btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="{{ trans('messages.edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can(App\Constants::USER_PASSWORD)
                                        <a href="/users/{{$user->id}}/password" class="btn btn-info btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.change_password') }}">
                                            <i class="fa fa-unlock-alt"></i>
                                        </a>
                                    @endcan

                                    @can(App\Constants::DELETE_USER)
                                        <form method="POST" action="/users/{{$user->id}}" style="display:inline; margin:0px; padding:0px;">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-danger btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.delete') }}" onclick="areYouSure(event, this);">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
