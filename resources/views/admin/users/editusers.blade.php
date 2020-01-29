@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">Përditëso përdoruesin</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/users/{{$user->id}}">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Emri</label>

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
                        <label for="email" class="col-md-4 col-form-label text-md-right">Adresa e-mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" style="color: black;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') == null ? $user->email : old('email')}}" required autocomplete="email" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">Roli</label>

                        <div class="col-md-6">
                        	<select id="role" class="form-control" name="role" required style="border-radius:5px; color: black;">
                        		@foreach($roles as $role)
                        			<option value="{{$role->id}}" {{old('role') == $user->role->id ? 'selected' : ($role->id == $user->role->id ? 'selected' : '')}}>
                        				{{$role->name}}
                        			</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>

                    <div class="col-md-12" style="text-align: right;">
                        <button type="submit" class="btn btn-success">
                            Përditëso
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-primary">
                            Kthehu
                        </a>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection
