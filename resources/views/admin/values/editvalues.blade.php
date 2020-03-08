@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.update_coefficients') }}</h3>
                </div>
            </center>

            <div class="table card-body" style="background-color: white;">
                <div class="col-md-12" style="text-align: center;">
                    <b>{{ trans('messages.category') }}:</b> {{ trans($category->name) }}
                </div>

                <br/>

                <form method="POST" action="/values/{{$category->id}}">
                    @method('PUT')
                    @csrf

                    <table id="editvaluesdetail" class="resulttable display responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ trans('messages.subproduct') }}</th>
                                <th>{{ trans('messages.technology') }}</th>
                                <th style="text-align: right;">{{ trans('messages.productivity') }}</th>
                                <th style="text-align: right;">{{ trans('messages.sales_cost') }}</th>
                                <th style="text-align: right;">{{ trans('messages.cost_per_unit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->cultures as $culture)
                                @foreach ($culture->values  as $value)
                                    <tr>
                                        <td>{{ trans($culture->name) }}</td>
                                        <td>{{ trans($value->technology->name) }}</td>
                                        <td>
                                            <input type="number" id="efficiency-{{$culture->id}}-{{$value->id}}"
                                            name="efficiency-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->efficiency + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0" style="text-align: right; color: black;"/>
                                        </td>
                                        <td>
                                            <input type="number" id="price-{{$culture->id}}-{{$value->id}}"
                                            name="price-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->price + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0" style="text-align: right; color: black;"/>
                                        </td>
                                        <td>
                                            <input type="number" id="cost-{{$culture->id}}-{{$value->id}}"
                                            name="cost-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->cost + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0" style="text-align: right; color: black;"/>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                    <br />

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
