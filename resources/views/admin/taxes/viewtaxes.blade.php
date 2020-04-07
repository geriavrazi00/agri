@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-6" style="padding-top: 56px; color: black;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.view_tax') }}</h3>
                </div>
            </center>

            <br/>

			<div class="table card-body" style="background-color: white;">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.name') }}</label>

                    <div class="col-md-6">
                        <label id="name" class="col-form-label" style="color: black;">{{ $tax->name }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bottom-threshold" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.bottom_threshold') }}</label>

                    <div class="col-md-6">
                        <label id="bottom-threshold" class="col-form-label" style="color: black;">ALL {{ fmod($tax->bottom_threshold, 1) ? number_format($tax->bottom_threshold, 2) : number_format($tax->bottom_threshold) }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="top-threshold" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.top_threshold') }}</label>

                    <div class="col-md-6">
                        <label id="top-threshold" class="col-form-label" style="color: black;">{{ $tax->top_threshold == null ? '-' : ('ALL ' . (fmod($tax->top_threshold, 1) ? number_format($tax->top_threshold, 2) : number_format($tax->top_threshold))) }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="percentage" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ trans('messages.percentage') }}</label>

                    <div class="col-md-6">
                        <label id="percentage" class="col-form-label" style="color: black;">{{ $tax->percentage + 0 }}%</label>
                    </div>
                </div>

                <div class="col-md-12" style="text-align: right;">
                    @can(App\Constants::EDIT_TAX)
                        <a href="/taxes/{{$tax->id}}/edit" class="btn btn-success">
                            {{ trans('messages.edit') }}
                        </a>
                    @endcan

                    @can(App\Constants::DELETE_TAX)
                        <form method="POST" action="/taxes/{{$tax->id}}" style="display:inline; margin:0px; padding:0px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                                {{ trans('messages.delete') }}
                            </button>
                        </form>
                    @endcan

                    <a href="/taxes" class="btn btn-primary">
                        {{ trans('messages.back') }}
                    </a>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
