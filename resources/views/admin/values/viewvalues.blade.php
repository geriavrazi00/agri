@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">Shiko të dhënat në detaje</h3>
                </div>
            </center>

            <br/>

            <div class="table card-body" style="background-color: white;">
                <div class="col-md-12" style="text-align: center;">
                    <b>Kategoria:</b> {{ $category->name }}
                </div>

                <br/>

                <table id="valuesdetail" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Nënproduktet</th>
                            <th>Teknologjia/Investimi</th>
                            <th style="text-align: right;">Rendimenti</th>
                            <th style="text-align: right;">Çmimi i shitjes</th>
                            <th style="text-align: right;">Kosto/njësi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->cultures as $culture)
                            @foreach ($culture->values  as $value)
                                <tr>
                                    <td>{{$culture->name}}</td>
                                    <td>{{$value->technology->name}}</td>
                                    <td style="text-align: right;">{{ fmod($value->efficiency, 1) ? number_format($value->efficiency, 2) : number_format($value->efficiency) }}</td>
                                    <td style="text-align: right;">ALL {{ fmod($value->price, 1) ? number_format($value->price, 2) : number_format($value->price) }}</td>
                                    <td style="text-align: right;">ALL {{ fmod($value->cost, 1) ? number_format($value->cost, 2) : number_format($value->cost) }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                <br />

                <div class="col-md-12" style="text-align: right;">
                    <a href="/values/{{$category->id}}/edit" class="btn btn-success">
                        Modifiko
                    </a>
                    <a href="/values" class="btn btn-primary">
                        Kthehu
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
