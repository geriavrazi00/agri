@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-8" style="padding-top: 56px;">

            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.processed_projects') }}</h3>
                </div>
            </center>

            <br/>

            <div class="table card-body" style="background-color: white;">

                <table id="planstable" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">{{ trans('messages.applicant') }}</th>
                            <th class="resulttablehead">{{ trans('messages.business_code') }}</th>
                            <th class="resulttablehead">{{ trans('messages.application_date') }}</th>
                            <th class="resulttablehead" style="text-align: center;">{{ trans('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{$plan->applicant}}</td>
                                <td class="resulttabledata">{{$plan->business_code}}</td>
                                <td class="resulttabledata">{{$plan->created_at}}</td>
                                <td class="resulttabledata" style="text-align: center;">
                                    <a href="/plans/{{$plan->id}}" class="btn btn-primary btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.details') }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{-- <a href="/plans/{{$plan->id}}/edit" class="btn btn-info btn-circle btn-sm edit-buttons" data-toggle="tooltip" title="Modifiko">
                                        <i class="fa fa-edit"></i>
                                    </a> --}}
                                    <form method="POST" action="/plans/{{$plan->id}}/export/excel" style="display:inline; margin:0px; padding:0px;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.excel_export') }}">
                                            <i class="fa fa-file-excel-o"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="/plans/{{$plan->id}}/export/pdf" style="display:inline; margin:0px; padding:0px;">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.pdf_export') }}">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="/plans/{{$plan->id}}" style="display:inline; margin:0px; padding:0px;">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-circle btn-sm action-buttons" data-toggle="tooltip" title="{{ trans('messages.delete') }}" onclick="areYouSure(event, this);">
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
