@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.edit_tax') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <form method="POST" action="/taxes/{{$tax->id}}">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" style="color: black;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $tax->name }}" required autocomplete="name" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '');" oninput="this.setCustomValidity('')">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bottom-threshold" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.bottom_threshold') }}</label>

                        <div class="col-md-6">
                            <input type="number" id="bottom-threshold" name="bottom-threshold" class="form-control @error('bottom-threshold') is-invalid @enderror" onkeydown="return blockSpecialCharactersInInputNumber(event);"
                            value="{{ $tax->bottom_threshold + 0 }}" step=".000001" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                            oninput="createInvalidMsg(this, '', '');" required min="0" style="text-align: right; color: black;"/>

                            @error('bottom-threshold')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="top-threshold" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.top_threshold') }}</label>

                        <div class="col-md-6">
                            <input type="number" id="top-threshold" name="top-threshold" class="form-control @error('top-threshold') is-invalid @enderror" onkeydown="return blockSpecialCharactersInInputNumber(event);"
                            value="{{ $tax->top_threshold + 0 }}" step=".000001" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                            oninput="createInvalidMsg(this, '', '');" min="0" style="text-align: right; color: black;"/>

                            @error('top-threshold')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="percentage" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.percentage') }}</label>

                        <div class="col-md-6">
                            <input type="number" id="percentage" name="percentage" class="form-control @error('percentage') is-invalid @enderror" onkeydown="return blockSpecialCharactersInInputNumber(event);"
                            value="{{ $tax->percentage + 0 }}" step=".000001" oninvalid="loanInterestRateValidation(this, 0, 100, '{{trans('validation.field_required')}}', '{{trans('validation.percentage_tax_min_value', ['value' => '0'])}}', '{{trans('validation.percentage_tax_max_value', ['value' => '100'])}}');"
                            oninput="createInvalidMsg(this, '', '');" required min="0" max="100" style="text-align: right; color: black;"/>

                            @error('percentage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12" style="text-align: right;">
                        <button type="submit" class="btn btn-success">
                            {{ trans('messages.update') }}
                        </button>

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
