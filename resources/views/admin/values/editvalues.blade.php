@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="padding-top:100px;">
                <center>
                    <div style="display: inline-flex; text-align: center;">
                        <h3 class="resulttablehead">Përditëso koefiçentët e kategorisë</h3>
                    </div>
                </center>

                <div class="table card-body" style="background-color: white;">
                    <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Kategoria</label>
                        <label id="name" class="col-md-6 col-form-label">{{$category->name}}</label>
                    </div>

                    <form method="POST" action="/values/{{$category->id}}">
                        @method('PUT')
                        @csrf

                        <table border="1" style="width: 100%;">
                            <tr>
                                <th>Teknologjia/Investimi</th>
                                <th>Nënproduktet</th>
                                <th>Rendimenti</th>
                                <th>Çmimi i shitjes</th>
                                <th>Kosto/njësi</th>
                            </tr>
                            @foreach ($category->cultures as $culture)
                                @foreach ($culture->values  as $value)
                                    <tr>
                                        <td>{{$value->technology->name}}</td>
                                        <td>{{$culture->name}}</td>
                                        <td>
                                            <input type="number" id="efficiency-{{$culture->id}}-{{$value->id}}"
                                            name="efficiency-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->efficiency + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0"/>
                                        </td>
                                        <td>
                                            <input type="number" id="price-{{$culture->id}}-{{$value->id}}"
                                            name="price-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->price + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0"/>
                                        </td>
                                        <td>
                                            <input type="number" id="cost-{{$culture->id}}-{{$value->id}}"
                                            name="cost-{{$culture->id}}-{{$value->id}}" class="form-control"
                                            onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                            value="{{$value->cost + 0}}" step=".000001"
                                            oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');"
                                            oninput="createInvalidMsg(this, '', '');" required min="0"/>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>

                        <br />

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-success">
                                    Përditëso
                                </button>

                                <a href="{{ url()->previous() }}" class="btn btn-primary">
                                    Kthehu
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
