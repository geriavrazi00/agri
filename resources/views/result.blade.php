@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 20px;">
	<div class="row justify-content-center">
        <div class="col-md-9" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">Rezultatet</h3>
                </div>
            </center>

            <br/>

            <div class="table card-body" style="background-color: white; margin: auto;">
                <div style="text-align: center;">
                    <div class="col-md-12">
                        <b>Emri i aplikantit:</b> {{$applicant}}
                    </div>

                    <div class="col-md-12">
                        <b>NIPT/Kodi i fermerit:</b> {{$businessCode}}
                    </div>

                    <div class="col-md-12">
                        <b>Data e aplikimit:</b> {{$date}}
                    </div>
                </div>

                <br/>

                <table id="resulttable1" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">Nënprodukti</th>
                            <th class="resulttablehead">Kategoria</th>
                            <th class="resulttablehead" style="text-align: right;">Njësi</th>
                            <th class="resulttablehead" style="text-align: right;">Rendimenti</th>
                            <th class="resulttablehead" style="text-align: right;">Prodhimi</th>
                            <th class="resulttablehead" style="text-align: right;">Të ardhura bruto për njësi</th>
                            <th class="resulttablehead" style="text-align: right;">Të ardhura bruto totale, viti 1</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i = 0; $i < sizeof($result->getCultures()); $i++)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{$result->getCultures()[$i][0]}}</td>
                                <td class="resulttabledata">{{$result->getCultures()[$i][1]}}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][2], 1) ? number_format($result->getCultures()[$i][2], 2) : number_format($result->getCultures()[$i][2]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][3], 1) ? number_format($result->getCultures()[$i][3], 2) : number_format($result->getCultures()[$i][3]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][4], 1) ? number_format($result->getCultures()[$i][4], 2) : number_format($result->getCultures()[$i][4]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getCultures()[$i][5], 1) ? number_format($result->getCultures()[$i][5], 2) : number_format($result->getCultures()[$i][5]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getCultures()[$i][6], 1) ? number_format($result->getCultures()[$i][6], 2) : number_format($result->getCultures()[$i][6]) }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <br />

                <table id="resulttable2" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <th class="resulttablehead">Përfitueshmeria e investimit</th>
                        <th class="resulttablehead"></th>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="resulttabledata">Totali i të ardhurave, viti 1</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalIncome(), 1) !== 0.00 ? number_format($result->getTotalIncome(), 2) : number_format($result->getTotalIncome()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Shpenzime prodhimi totale</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalExpense(), 1) !== 0.00 ? number_format($result->getTotalExpense(), 2) : number_format($result->getTotalExpense()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Amortizimi</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalAmortization(), 1) !== 0.00 ? number_format($result->getTotalAmortization(), 2) : number_format($result->getTotalAmortization()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Interesi vjetor</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getYearlyInterest(), 1) !== 0.00 ? number_format($result->getYearlyInterest(), 2) : number_format($result->getYearlyInterest()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Fitimi para tatimit</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getIncomeBeforeTax(), 1) !== 0.00 ? number_format($result->getIncomeBeforeTax(), 2) : number_format($result->getIncomeBeforeTax()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Tatimi mbi fitimin</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getIncomeTax(), 1) !== 0.00 ? number_format($result->getIncomeTax(), 2) : number_format($result->getIncomeTax()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Fitimi neto total</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalNetIncome(), 1) !== 0.00 ? number_format($result->getTotalNetIncome(), 2) : number_format($result->getTotalNetIncome()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Fluksi i parase i vlefshëm për pagesa kredie</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getMoneyFlux(), 1) !== 0.00 ? number_format($result->getMoneyFlux(), 2) : number_format($result->getMoneyFlux()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">Këste kredie për 1 vit</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getFirstYearCredit(), 1) !== 0.00 ? number_format($result->getFirstYearCredit(), 2) : number_format($result->getFirstYearCredit()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">DSCR</td>
                            <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getDscr(), 1) !== 0.00 ? number_format($result->getDscr(), 2) : number_format($result->getDscr()) }}</td>
                        </tr>
                    </tbody>
                </table>

                <br/>

                <div class="col-md-12" style="text-align: right;">
                    <form method="POST" action="/plans/save" style="display: inline; margin: 0px;">
                        @csrf
                        <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                        <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                        <input type="hidden" id="date" name="date" value="{{ $date }}" />

                        <button type="submit" class="btn btn-primary">Ruaj aplikimin</button>
                    </form>

                    <form method="POST" action="/export/excel" style="display: inline; margin: 0px;">
                        @csrf
                        <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                        <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                        <input type="hidden" id="date" name="date" value="{{ $date }}" />

                        <button type="submit" class="btn btn-success">Eksport Excel</button>
                    </form>

                    <form method="POST" action="/export/pdf" style="display: inline; margin: 0px;">
                        @csrf
                        <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                        <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                        <input type="hidden" id="date" name="date" value="{{ $date }}" />

                        <button type="submit" class="btn btn-info">Eksport PDF</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
