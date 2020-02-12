<div style="float: right;">
    <img src="{{ public_path('/img/logo/aasf.png') }}" height="90px;"/>
</div>

<p><span style="font-weight: bold">{{ trans('messages.applicant_name') }}:</span> {{ $applicant }}</p>
<p><span style="font-weight: bold">{{ trans('messages.business_code') }}:</span> {{ $businessCode }}</p>
<p><span style="font-weight: bold">{{ trans('messages.application_date') }}:</span> {{ date("d-m-Y H:i:s", strtotime($date)) }}</p>

<h4 style="text-align: center">{{ trans('messages.inputs') }}</h4>

@foreach($input as $category)
    <p><span style="font-weight: bold">{{ trans('messages.category') }}:</span> {{ trans($category->farmCategory->name) }}</p>

    @for($i = 0; $i < $category->farmCategory->option_number; $i++)
        @if($category->businessData[$i][1] != 0)
            <table border="1" cellspacing="0" cellpadding="0" style="width: 60%;">
                <tr>
                    <th>
                        <b>{{trans('messages.business_data')}}</b>
                    </th>
                    <th>
                        <b>{{ trans('messages.values') }}</b>
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ trans($category->businessLabels[0]) }}
                    </td>
                    <td style="text-align: right;">{{ fmod($category->businessData[$i][0], 1) ? number_format($category->businessData[$i][0], 2) : number_format($category->businessData[$i][0]) }}</td>
                </tr>
                <tr>
                    <td>
                        {{ trans($category->businessLabels[1]) }}
                    </td>
                    <td>{{ trans(App\Technology::find($category->businessData[$i][1])->name) }}</td>
                </tr>
                @for($j = 0; $j < $category->farmCategory->culture_number; $j++)
                    <tr>
                        <td>
                            {{ trans($category->businessLabels[$j+2]) }}
                        </td>
                        <td>
                            {{ $category->businessData[$i][$j+2] == 0 ? trans('messages.none') : trans(App\Culture::find($category->businessData[$i][$j+2])->name) }}
                        </td>
                    </tr>
                @endfor
            </table>

            <br/>

            <table border="1" cellspacing="0" cellpadding="0" style="width: 80%;">
                <tr>
                    <th style="text-align: center;">
                        <b>{{ trans('messages.investment_plan') }}</b>
                    </th>
                    <th style="text-align: center;">
                        <b>{{ trans('messages.total_value') }}</b>
                    </th>
                    <th style="text-align: center;">
                        <b>{{ trans('messages.financing_bank') }}</b>
                    </th>
                </tr>
                @for($j = 0; $j < sizeof($category->investmentPlans[$i]); $j++)
                    <tr>
                        <td>
                            {{ trans($category->investmentLabels[$j]) }}
                        </td>
                        <td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($category->totalValuePlans[$i][$j], 1) ? number_format($category->totalValuePlans[$i][$j], 2) : number_format($category->totalValuePlans[$i][$j]) }}</td>
                        <td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($category->investmentPlans[$i][$j], 1) ? number_format($category->investmentPlans[$i][$j], 2) : number_format($category->investmentPlans[$i][$j]) }}</td>
                    </tr>
                @endfor
            </table>

            @if($category->farmCategory->option_number > 1)
                <br/>
            @endif
        @endif
    @endfor

@endforeach

<br/>

<table border="1" cellspacing="0" cellpadding="0"  style="width: 60%;">
    <tr>
        <th style="text-align: center;"><b>{{ trans('messages.loan_repayment') }}</b></th>
        <th style="text-align: center;"><b>{{ trans('messages.loan_data_1') }}</b></th>
        <th style="text-align: center;"><b>{{ trans('messages.loan_data_2') }}</b></th>
    </tr>
    <tr>
        <td>{{ trans('loan_data.yearly_interest') }}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[0][0], 1) ? number_format($input[0]->loanData[0][0], 2) : number_format($input[0]->loanData[0][0]) }}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[1][0], 1) ? number_format($input[0]->loanData[1][0], 2) : number_format($input[0]->loanData[1][0]) }}</td>
    </tr>
    <tr>
        <td>{{ trans('loan_data.yearly_interest') }}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[0][1], 1) ? number_format($input[0]->loanData[0][1], 2) : number_format($input[0]->loanData[0][1]) }} %</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[1][1], 1) ? number_format($input[0]->loanData[1][1], 2) : number_format($input[0]->loanData[1][1]) }} %</td>
    </tr>
    <tr>
        <td>{{trans('loan_data.years_to_pay')}}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[0][2], 1) ? number_format($input[0]->loanData[0][2], 2) : number_format($input[0]->loanData[0][2]) }}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[1][2], 1) ? number_format($input[0]->loanData[1][2], 2) : number_format($input[0]->loanData[1][2]) }}</td>
    </tr>
    <tr>
        <td>{{trans('loan_data.yearly_payments')}}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[0][3], 1) ? number_format($input[0]->loanData[0][3], 2) : number_format($input[0]->loanData[0][3]) }}</td>
        <td style="text-align: right;">{{ fmod($input[0]->loanData[1][3], 1) ? number_format($input[0]->loanData[1][3], 2) : number_format($input[0]->loanData[1][3]) }}</td>
    </tr>
    <tr>
        <td>{{trans('loan_data.first_payment_date')}}</td>
        <td style="text-align: right;">{{ $input[0]->loanData[0][4] }}</td>
        <td style="text-align: right;">{{ $input[0]->loanData[1][4] }}</td>
    </tr>
</table>

<h4 style="text-align: center">{{ trans('messages.results') }}</h4>

<table border="1" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th style="text-align: center"><b>{{ trans('messages.subproduct') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.category') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.unit') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.productivity') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.production') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.gross_income') }}</b></th>
			<th style="text-align: center"><b>{{ trans('messages.total_gross_income') }}</b></th>
		</tr>
	</thead>

	<tbody>
		@for($i = 0; $i < sizeof($result->cultures); $i++)
			<tr>
				<td>{{ trans($result->cultures[$i][0]) }}</td>
				<td>{{ trans($result->cultures[$i][1]) }}</td>
				<td style="text-align: right;">{{ fmod($result->cultures[$i][2], 1) !== 0.00 ? number_format($result->cultures[$i][2], 2) : number_format($result->cultures[$i][2]) }}</td>
				<td style="text-align: right;">{{ fmod($result->cultures[$i][3], 1) !== 0.00 ? number_format($result->cultures[$i][3], 2) : number_format($result->cultures[$i][3]) }}</td>
				<td style="text-align: right;">{{ fmod($result->cultures[$i][4], 1) !== 0.00 ? number_format($result->cultures[$i][4], 2) : number_format($result->cultures[$i][4]) }}</td>
				<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->cultures[$i][5], 1) !== 0.00 ? number_format($result->cultures[$i][5], 2) : number_format($result->cultures[$i][5]) }}</td>
				<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->cultures[$i][6], 1) !== 0.00 ? number_format($result->cultures[$i][6], 2) : number_format($result->cultures[$i][6]) }}</td>
			</tr>
		@endfor
	</tbody>
</table>

<br/><br/>

<table border="1" cellspacing="0" cellpadding="0" style="width: 100%;">
	<tbody>
		<tr>
            <th><b>{{ trans('messages.investment_profitability') }}</b></th>
            <th style="text-align: right;"><b>{{ trans('messages.result_of_profitability') }}</b></th>
		</tr>
		<tr>
			<td style="width: 50%;">{{ trans('messages.total_revenue') }}</td>
			<td style="width: 50%; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalIncome, 1) !== 0.00 ? number_format($result->totalIncome, 2) :  number_format($result->totalIncome )}}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.total_production_costs') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalExpense, 1) !== 0.00 ? number_format($result->totalExpense, 2) : number_format($result->totalExpense) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.depreciation') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalAmortization, 1) !== 0.00 ? number_format($result->totalAmortization, 2) : number_format($result->totalAmortization) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.annual_interest') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->yearlyInterest, 1) !== 0.00 ? number_format($result->yearlyInterest, 2) : number_format($result->yearlyInterest) }}</td>
        </tr>
        <tr>
            <td>{{ trans('messages.profit_before_tax') }}</td>
            <td style="text-align: right;"><span style="float: left;">ALL </span> {{ fmod($result->incomeBeforeTax, 1) !== 0.00 ? number_format($result->incomeBeforeTax, 2) : number_format($result->incomeBeforeTax) }}</td>
        </tr>
		<tr>
			<td>{{ trans('messages.profit_tax') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->incomeTax, 1) !== 0.00 ? number_format($result->incomeTax, 2) : number_format($result->incomeTax) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.total_net_profit') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalNetIncome, 1) !== 0.00 ? number_format($result->totalNetIncome, 2) : number_format($result->totalNetIncome) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.cash_flow') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->moneyFlux, 1) !== 0.00 ? number_format($result->moneyFlux, 2) : number_format($result->moneyFlux) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.loan_installments') }}</td>
			<td style="text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->firstYearCredit, 1) !== 0.00 ? number_format($result->firstYearCredit, 2) : number_format($result->firstYearCredit) }}</td>
		</tr>
		<tr>
			<td>{{ trans('messages.dscr') }}</td>
			<td style="text-align: right;">{{ fmod($result->dscr, 1) !== 0.00 ? number_format($result->dscr, 2) : number_format($result->dscr) }}</td>
		</tr>
	</tbody>
</table>
