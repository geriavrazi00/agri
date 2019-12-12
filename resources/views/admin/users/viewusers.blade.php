@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top:100px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Shiko të dhënat në detaje</h3>
					</div>
				</center>
			</div>

			<div class="table card-body" style="background-color: white;">
                <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Emri</label>
                    <label id="name" class="col-md-6 col-form-label">{{$user->name}}</label>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-6 col-form-label text-md-right">Adresa e-mail</label>
                    <label id="email" class="col-md-6 col-form-label">{{$user->email}}</label>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-6 col-form-label text-md-right">Roli</label>
                    <label id="role" class="col-md-6 col-form-label">{{$user->role->name}}</label>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <a href="/users/{{$user->id}}/edit" class="btn btn-success">
                            Modifiko
                        </a>
                        <a href="/users/{{$user->id}}/password" class="btn btn-info">
                            Ndrysho fjalëkalimin
                        </a>
                        <form method="POST" action="/users/{{$user->id}}" style="display:inline; margin:0px; padding:0px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                                Fshi
                            </button>
                        </form>
                        <a href="/users" class="btn btn-primary">
                            Kthehu
                        </a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
