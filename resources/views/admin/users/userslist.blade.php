@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
        <div class="col-md-7" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">Menaxhimi i përdoruesve</h3>

                    <a href="/users/create" class="btn btn-primary navbar-btn ml-0 ml-lg-3" style="height: fit-content;">
                        Krijo
                    </a>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <table id="userstable" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">Emri</th>
                            <th class="resulttablehead">E-mail</th>
                            <th class="resulttablehead" style="text-align: center;">Veprime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{$user->name}}</td>
                                <td class="resulttabledata">{{$user->email}}</td>
                                <td class="resulttabledata" style="text-align: center;">
                                    <a href="/users/{{$user->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Shiko detajet">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="/users/{{$user->id}}/edit" class="btn btn-success btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="Modifiko">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="/users/{{$user->id}}/password" class="btn btn-info btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Ndrysho fjalëkalimin">
                                        <i class="fa fa-unlock-alt"></i>
                                    </a>

                                    <form method="POST" action="/users/{{$user->id}}" style="display:inline; margin:0px; padding:0px;">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-circle btn-sm action-buttons" data-toggle="tooltip" title="Fshi" onclick="areYouSure(event, this);">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
