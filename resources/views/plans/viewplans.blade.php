@extends('layouts.app')

@section('content')

<div class="hero" style="padding: 20px; height: 100%;">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div style="padding-top: 56px;">
				<center>
					<div style="display: inline-flex; text-align: center;">
						<h3 class="resulttablehead">Shiko të dhënat në detaje</h3>
					</div>
				</center>
			</div>

            <div class="table card-body col-md-8" style="background-color: white; margin: auto;">
                <div style="text-align: center;">
                    <div class="col-md-12">
                        <b>Emri i aplikantit:</b> {{$plan->applicant}}
                    </div>

                    <div class="col-md-12">
                        <b>NIPT/Kodi i fermerit:</b> {{$plan->business_code}}
                    </div>

                    <div class="col-md-12">
                        <b>Data e krijimit:</b> {{$plan->created_at}}
                    </div>
                </div>

                <br/>

                <h4 style="text-align: center">Inputet</h4>

                @foreach($inputs as $category)
                    <div class="col-md-12" style="text-align: center;">
                        <b>Kategoria:</b> {{ $category->farmCategory->name }}
                    </div>

                    @for($i = 0; $i < $category->farmCategory->option_number; $i++)
                        @if($category->businessData[$i][1] != 0)
                            <div class="col-md-12" style="margin: auto;">
                                <table id="plansdetailbusiness{{$i}}" class="resulttable display responsive" style="width: 100%;">
                                    <thead>
                                        <tr class="resulttablerow">
                                            <th class="resulttablehead">
                                                <b>{{trans('messages.business_data')}}</b>
                                            </th>
                                            <th class="resulttablehead">
                                                Vlerat
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>

                            <br/>

                            <div class="col-md-12" style="margin: auto;">
                                <table id="plansdetailinvestment{{$i}}" class="resulttable display responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr class="resulttablerow">
                                            <th class="resulttablehead">
                                                <b>{{ trans('messages.investment_plan') }}</b>
                                            </th>
                                            <th class="resulttablehead" style="text-align: right;">
                                                <b>{{ trans('messages.total_value') }}</b>
                                            </th>
                                            <th class="resulttablehead" style="text-align: right;">
                                                <b>{{ trans('messages.financing_bank') }}</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($j = 0; $j < sizeof($category->investmentPlans[$i]); $j++)
                                            <tr class="resulttablerow">
                                                <td class="resulttabledata">
                                                    {{ trans('investment_plan.' . $category->investmentLabels[$j]) }}
                                                </td>
                                                <td class="resulttabledata" style="text-align: right;">
                                                    <span style="text-align: left;">ALL </span>{{ fmod($category->totalValuePlans[$i][$j], 1) ? number_format($category->totalValuePlans[$i][$j], 2) : number_format($category->totalValuePlans[$i][$j]) }}
                                                </td>
                                                <td class="resulttabledata" style="text-align: right;">
                                                    <span style="text-align: left;">ALL </span>{{ fmod($category->investmentPlans[$i][$j], 1) ? number_format($category->investmentPlans[$i][$j], 2) : number_format($category->investmentPlans[$i][$j]) }}
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endfor
                @endforeach

                <div class="col-md-12" style="margin: auto;">
                    <table id="plansdetailloan" class="resulttable display responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr class="resulttablerow">
                                <th class="resulttablehead"><b>{{ trans('messages.loan_repayment') }}</b></th>
                                <th class="resulttablehead" style="text-align: right;"><b>{{ trans('messages.loan_data') }}</b></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td class="resulttabledata" style="text-align: right;">{{ $inputs[0]->loanData[3] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br/>
                <h4 style="text-align: center">Rezultatet</h4>

                <div class="col-md-12" style="margin: auto;">
                    <table id="plansdetairesult1" class="resulttable display responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr class="resulttablerow">
                                <th class="resulttablehead">Nënprodukti</th>
                                <th class="resulttablehead">Kategoria</th>
                                <th class="resulttablehead" style="text-align: right;">Njësi</th>
                                <th class="resulttablehead" style="text-align: right;">Rendimenti</th>
                                <th class="resulttablehead" style="text-align: right;">Prodhimi</th>
                                <th class="resulttablehead" style="text-align: right;">Të ardhura bruto për njësi</th>
                                <th class="resulttablehead" style="text-align: right;">Të ardhura bruto totale</th>
                            </tr>
                        </thead>

                        <tbody>
                            @for($i = 0; $i < sizeof($result->cultures); $i++)
                                <tr class="resulttablerow">
                                    <td class="resulttabledata">{{$result->cultures[$i][0]}}</td>
                                    <td class="resulttabledata">{{$result->cultures[$i][1]}}</td>
                                    <td class="resulttabledata" style="text-align: right;">{{ fmod($result->cultures[$i][2], 1) ? number_format($result->cultures[$i][2], 2) : number_format($result->cultures[$i][2]) }}</td>
                                    <td class="resulttabledata" style="text-align: right;">{{ fmod($result->cultures[$i][3], 1) ? number_format($result->cultures[$i][3], 2) : number_format($result->cultures[$i][3]) }}</td>
                                    <td class="resulttabledata" style="text-align: right;">{{ fmod($result->cultures[$i][4], 1) ? number_format($result->cultures[$i][4], 2) : number_format($result->cultures[$i][4]) }}</td>
                                    <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->cultures[$i][5], 1) ? number_format($result->cultures[$i][5], 2) : number_format($result->cultures[$i][5]) }}</td>
                                    <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->cultures[$i][6], 1) ? number_format($result->cultures[$i][6], 2) : number_format($result->cultures[$i][6]) }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <br/>

                <div class="col-md-12" style="margin: auto;">
                    <table id="plansdetairesult2" class="resulttable display responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr class="resulttablerow">
                                <th class="resulttablehead"><b>Përfitueshmeria e investimit</b></th>
                                <th class="resulttablehead" style="text-align: right;"><b>Rezultati i përfitueshmërisë</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Totali i të ardhurave, viti 1</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->totalIncome, 1) ? number_format($result->totalIncome, 2) : number_format($result->totalIncome) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Shpenzime prodhimi totale</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->totalExpense, 1) ? number_format($result->totalExpense, 2) : number_format($result->totalExpense) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Amortizimi</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->totalAmortization, 1) ? number_format($result->totalAmortization, 2) : number_format($result->totalAmortization) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Interesi vjetor</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->yearlyInterest, 1) ? number_format($result->yearlyInterest, 2) : number_format($result->yearlyInterest) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Fitimi para tatimit</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span> {{ fmod($result->incomeBeforeTax, 1) ? number_format($result->incomeBeforeTax, 2) : number_format($result->incomeBeforeTax) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Tatimi mbi fitimin</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->incomeTax, 1) ? number_format($result->incomeTax, 2) : number_format($result->incomeTax) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Fitimi neto total</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->totalNetIncome, 1) ? number_format($result->totalNetIncome, 2) : number_format($result->totalNetIncome) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Fluksi i parase i vlefshëm për pagesa kredie</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->moneyFlux, 1) ? number_format($result->moneyFlux, 2) : number_format($result->moneyFlux) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">Këste kredie për 1 vit</td>
                                <td class="resulttabledata" style="text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($result->firstYearCredit, 1) ? number_format($result->firstYearCredit, 2) : number_format($result->firstYearCredit) }}</td>
                            </tr>
                            <tr class="resulttablerow">
                                <td class="resulttabledata">DSCR</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->dscr, 1) ? number_format($result->dscr, 2) : number_format($result->dscr) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br/>

                <div class="col-md-12" style="text-align: right;">
                    <form method="POST" action="/plans/{{$plan->id}}/export/excel" style="display: inline; margin: 0px;">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Eksport Excel
                        </button>
                    </form>

                    <form method="POST" action="/plans/{{$plan->id}}/export/pdf" style="display: inline; margin: 0px;">
                        @csrf
                        <button type="submit" class="btn btn-info">
                            Eksport PDF
                        </button>
                    </form>

                    <form method="POST" action="/plans/{{$plan->id}}" style="display: inline; margin: 0px;">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger" onclick="areYouSure(event, this);">
                            Fshi
                        </button>
                    </form>

                    <form style="display: inline; margin: 0px;">
                        <a href="/plans" class="btn btn-primary">
                            Kthehu
                        </a>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection
