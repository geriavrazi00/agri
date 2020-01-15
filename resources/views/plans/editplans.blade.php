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
			</div>

			<div class="table card-body" style="background-color: white;">
                <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Aplikanti:</label>
                    <label id="name" class="col-md-6 col-form-label">{{$plan->applicant}}</label>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label text-md-right">Data e krijimit:</label>
                    <label id="name" class="col-md-6 col-form-label">{{$plan->created_at}}</label>
                </div>

                <h4 style="text-align: center">Inputet</h4>

                @foreach($inputs as $category)
                    <div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-md-right">Kategoria:</label>
                        <label id="name" class="col-md-6 col-form-label">{{ $category->farmCategory->name }}</label>
                    </div>

                    <div style="display: flex;">
                        @for($i = 0; $i < $category->farmCategory->option_number; $i++)
                            <table class="resulttable">
                                <tr class="resulttablerow">
                                    <th class="resulttablehead" colspan="2" style="text-align: center;">
                                        <b>{{trans('messages.business_data')}}</b>
                                    </th>
                                </tr>
                                <tr class="resulttablerow">
                                    <td class="resulttabledata">
                                        {{ trans('business_data.' . $category->businessLabels[0]) }}
                                    </td>
                                    <td class="resulttabledata" style="text-align: right;">{{ fmod($category->businessData[$i][0], 1) ? number_format($category->businessData[$i][0], 2) : number_format($category->businessData[$i][0]) }}</td>
                                </tr>
                                <tr class="resulttablerow">
                                    <td class="resulttabledata">
                                        {{ trans('business_data.' . $category->businessLabels[1]) }}
                                    </td>
                                    <td class="resulttabledata">{{ App\Technology::find($category->businessData[$i][1])->name }}</td>
                                </tr>
                                @for($j = 0; $j < $category->farmCategory->culture_number; $j++)
                                    <tr class="resulttablerow">
                                        <td class="resulttabledata">
                                            {{ trans('business_data.' . $category->businessLabels[$j+2]) }}
                                        </td>
                                        <td class="resulttabledata">
                                            {{ $category->businessData[$i][$j+2] == 0 ? trans('messages.none') : App\Culture::find($category->businessData[$i][$j+2])->name }}
                                        </td>
                                    </tr>
                                @endfor
                            </table>

                            <br/>

                            <table class="resulttable">
                                <tr class="resulttablerow">
                                    <th class="resulttablehead" style="text-align: center;">
                                        <b>{{ trans('messages.investment_plan') }}</b>
                                    </th>
                                    <th class="resulttablehead" style="text-align: center;">
                                        <b>{{ trans('messages.value') }}</b>
                                    </th>
                                </tr>
                                @for($j = 0; $j < sizeof($category->investmentPlans[$i]); $j++)
                                    <tr class="resulttablerow">
                                        <td class="resulttabledata">
                                            {{ trans('investment_plan.' . $category->investmentLabels[$j]) }}
                                        </td>
                                        <td class="resulttabledata" style="text-align: right;">
                                            <span style="text-align: left;">ALL </span>{{ fmod($category->investmentPlans[$i][$j], 1) ? number_format($category->investmentPlans[$i][$j], 2) : number_format($category->investmentPlans[$i][$j]) }}
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        @endfor
                    </div>
                @endforeach

                <table class="resulttable">
                    <tr class="resulttablerow">
                        <th class="resulttablehead" style="text-align: center;"><b>{{ trans('messages.loan_repayment') }}</b></th>
                        <th class="resulttablehead" style="text-align: center;"><b>{{ trans('messages.loan_data') }}</b></th>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{ trans('loan_data.yearly_interest') }}</td>
                        <td class="resulttabledata" style="text-align: right;">{{ fmod($inputs[0]->loanData[0], 1) ? number_format($inputs[0]->loanData[0], 2) : number_format($inputs[0]->loanData[0]) }} %</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans('loan_data.years_to_pay')}}</td>
                        <td class="resulttabledata" style="text-align: right;">{{ fmod($inputs[0]->loanData[1], 1) ? number_format($inputs[0]->loanData[1], 2) : number_format($inputs[0]->loanData[1]) }}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans('loan_data.yearly_payments')}}</td>
                        <td class="resulttabledata" style="text-align: right;">{{ fmod($inputs[0]->loanData[2], 1) ? number_format($inputs[0]->loanData[2], 2) : number_format($inputs[0]->loanData[2]) }}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans('loan_data.first_payment_date')}}</td>
                        <td class="resulttabledata" style="text-align: right;">{{ date("d-m-Y", strtotime($inputs[0]->loanData[3])) }}</td>
                    </tr>
                </table>

                <h4 style="text-align: center">Rezultatet</h4>

                <table class="resulttable">
                    <tr class="resulttablerow">
                        <th class="resulttablehead">Nënprodukti</th>
                        <th class="resulttablehead">Kategoria</th>
                        <th class="resulttablehead">Njësi</th>
                        <th class="resulttablehead">Rendimenti</th>
                        <th class="resulttablehead">Prodhimi</th>
                        <th class="resulttablehead">Të ardhura bruto për njësi</th>
                        <th class="resulttablehead">Të ardhura bruto totale</th>
                    </tr>

                    @for($i = 0; $i < sizeof($result->cultures); $i++)
                        <tr class="resulttablerow">
                            <td class="resulttabledata">{{$result->cultures[$i][0]}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][1]}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][2]}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][3] + 0}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][4]}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][5]}}</td>
                            <td class="resulttabledata">{{$result->cultures[$i][6]}}</td>
                        </tr>
                    @endfor
                </table>

                <br/>

                <table class="resulttable">
                    <tr class="resulttablerow">
                        <th colspan="2" class="resulttablehead" style="text-align:center;"><b>Përfitueshmeria e investimit</b></th>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Totali i të ardhurave, viti 1</td>
                        <td class="resulttabledata">{{$result->totalIncome}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Shpenzime prodhimi totale</td>
                        <td class="resulttabledata">{{$result->totalExpense}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Amortizimi</td>
                        <td class="resulttabledata">{{$result->totalAmortization}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Interesi vjetor</td>
                        <td class="resulttabledata">{{$result->yearlyInterest}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Tatimi mbi fitimin</td>
                        <td class="resulttabledata">{{$result->incomeTax}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Fitimi neto total</td>
                        <td class="resulttabledata">{{$result->totalNetIncome}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Fluksi i parase i vlefshëm për pagesa kredie</td>
                        <td class="resulttabledata">{{$result->moneyFlux}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">Këste kredie për 1 vit</td>
                        <td class="resulttabledata">{{$result->firstYearCredit}}</td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">DSCR</td>
                        <td class="resulttabledata">{{$result->dscr}}</td>
                    </tr>
                </table>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <form method="POST" action="/plans/{{$plan->id}}/export/excel" style="display:inline; margin:0px; padding:0px;">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Eksport Excel
                            </button>
                        </form>
                        <form method="POST" action="/plans/{{$plan->id}}/export/pdf" style="display:inline; margin:0px; padding:0px;">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Eksport PDF
                            </button>
                        </form>
                        <form method="POST" action="/plans/{{$plan->id}}" style="display:inline; margin:0px; padding:0px;">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                                Fshi
                            </button>
                        </form>
                        <a href="/plans" class="btn btn-primary">
                            Kthehu
                        </a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
