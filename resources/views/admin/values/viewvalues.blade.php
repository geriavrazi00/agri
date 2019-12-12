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

                <div class="table card-body" style="background-color: white;">
                    <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Kategoria</label>
                        <label id="name" class="col-md-6 col-form-label">{{$category->name}}</label>
                    </div>

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
                                    <td>{{$value->efficiency + 0}}</td>
                                    <td>{{$value->price + 0}}</td>
                                    <td>{{$value->cost + 0}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>

                    <br />

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-5">
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
    </div>
</div>

@endsection
