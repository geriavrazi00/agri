@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{trans('messages.enter_data')}}</div>

                <div class="card-body">
                    <label for="applicant-name">{{trans('messages.applicant_name')}}</label>
                    <input class="form-control" type="text" name="applicant-name"/>

                    <label for="farm-type">{{trans('messages.farm_type')}}</label>
                    <select class="form-control" id="farm-type" onchange="chooseCategory();">
                        <option value="null">{{trans('messages.none')}}</option>
                        @for($i = 0; $i < sizeof($categories); $i++)
                            <option value="{{$categories[$i]->id}}">{{$categories[$i]->name}}</option>
                        @endfor
                    </select>

                    <br/>

                    @include('inputs')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
