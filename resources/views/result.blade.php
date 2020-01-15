@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 20px;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div>
                <div style="padding-top:100px;">
                    <div>
                        <h5>Emri i aplikantit: {{$applicant}}</h5>
                        <h5>Data e aplikimit: {{$date}}</h5>
                    </div>

					<table class="resulttable">
						<tr class="resulttablerow">
							<th class="resulttablehead">Nënprodukti</th>
							<th class="resulttablehead">Kategoria</th>
							<th class="resulttablehead">Njësi</th>
							<th class="resulttablehead">Rendimenti</th>
							<th class="resulttablehead">Prodhimi</th>
							<th class="resulttablehead">Të ardhura bruto për njësi</th>
							<th class="resulttablehead">Të ardhura bruto totale, viti 1</th>
							<th class="resulttablehead">Shpenzime prodhimi</th>
						</tr>

						@for($i = 0; $i < sizeof($result->getCultures()); $i++)
							<tr class="resulttablerow">
								<td class="resulttabledata">{{$result->getCultures()[$i][0]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][1]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][2]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][3] + 0}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][4]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][5]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][6]}}</td>
								<td class="resulttabledata">{{$result->getCultures()[$i][7]}}</td>
							</tr>
							@endfor
					</table>

					<br />

					<table class="resulttable">
						<tr>
							<th class="resulttablehead" colspan="2" style="text-align:center;">Perfitueshmeria e investimit</th>
						</tr>
						<tr>
							<td class="resulttabledata">Totali i të ardhurave, viti 1</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getTotalIncome()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Shpenzime prodhimi totale</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getTotalExpense()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Amortizimi</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getTotalAmortization()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Interesi vjetor</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getYearlyInterest()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Tatimi mbi fitimin</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getIncomeTax()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Fitimi neto total</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getTotalNetIncome()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Fluksi i parase i vlefshëm për pagesa kredie</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getMoneyFlux()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">Këste kredie për 1 vit</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getFirstYearCredit()}}</td>
						</tr>
						<tr>
							<td class="resulttabledata">DSCR</td>
							<td class="resulttabledata" style="color:#2372c7dc; text-align: right;">{{$result->getDscr()}}</td>
						</tr>
                    </table>

                    <div class="col-md-12" style="display: flex;">
                        <form method="POST" action="/plans/save">
                            @csrf
                            <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                            <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                            <input type="hidden" id="date" name="date" value="{{ $date }}" />

                            <div class="col-md-4" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Ruaj aplikimin</button>
                            </div>
                        </form>

                        <form method="POST" action="/export/excel">
                            @csrf
                            <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                            <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                            <input type="hidden" id="date" name="date" value="{{ $date }}" />

                            <div class="col-md-4" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Eksport Excel</button>
                            </div>
                        </form>

                        <form method="POST" action="/export/pdf">
                            @csrf
                            <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                            <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                            <input type="hidden" id="date" name="date" value="{{ $date }}" />

                            <div class="col-md-4" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Eksport PDF</button>
                            </div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
