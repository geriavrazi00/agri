@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-7" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.coefficient_management') }}</h3>
                </div>
            </center>

            <br/>

            <div class="table card-body" style="background-color: white;">
                <table id="valuestable" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">{{ trans('messages.category') }}</th>
                            <th class="resulttablehead" style="text-align: center;">{{ trans('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{ trans($category->name) }}</td>
                                <td class="resulttabledata" style="text-align: center;">
                                    <a href="/values/{{$category->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.details') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @can(App\Constants::EDIT_COEFFICIENT)
                                        <a href="/values/{{$category->id}}/edit" class="btn btn-success btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="{{ trans('messages.edit_coefficient') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
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
