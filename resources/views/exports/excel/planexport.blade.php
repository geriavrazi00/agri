<table>
	<tr>
		<td style="text-align: right; border: 2px solid #000000;"><b>Emri i aplikantit:</b></td>
		<td style="border: 2px solid #000000;">{{ $applicant }}</td>
    </tr>
    <tr>
		<td style="text-align: right; border: 2px solid #000000;"><b>Data e aplikimit:</b></td>
		<td style="border: 2px solid #000000;">{{ date("d-m-Y H:i:s", strtotime($date)) }}</td>
	</tr>
</table>

@foreach($input as $category)
	<table>
		<tr>
			<td style="text-align: right; border: 2px solid #000000;"><b>Kategoria:</b></td>
			<td style="border: 2px solid #000000;">{{ $category->farmCategory->name }}</td>
		</tr>
	</table>

	<div style="display: flex;">
        @for($i = 0; $i < $category->farmCategory->option_number; $i++)
            <table>
                <tr>
                    <th colspan="2" style="text-align: center; border: 2px solid #000000;">
                        <b>{{trans('messages.business_data')}}</b>
                    </th>
                </tr>
                <tr>
                    <td style="border: 2px solid #000000;">
                        {{ trans('business_data.' . $category->businessLabels[0]) }}
                    </td>
                    <td style="border: 2px solid #000000; text-align: right;">{{ fmod($category->businessData[$i][0], 1) ? number_format($category->businessData[$i][0], 2) : number_format($category->businessData[$i][0]) }}</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #000000;">
                        {{ trans('business_data.' . $category->businessLabels[1]) }}
                    </td>
                    <td style="border: 2px solid #000000;">{{ App\Technology::find($category->businessData[$i][1])->name }}</td>
                </tr>
                @for($j = 0; $j < $category->farmCategory->culture_number; $j++)
                    <tr>
                        <td style="border: 2px solid #000000;">
                            {{ trans('business_data.' . $category->businessLabels[$j+2]) }}
                        </td>
                        <td style="border: 2px solid #000000;">
                            {{ $category->businessData[$i][$j+2] == 0 ? trans('messages.none') : App\Culture::find($category->businessData[$i][$j+2])->name }}
                        </td>
                    </tr>
                @endfor
            </table>

            <br/>

	        <table border="1">
	            <tr>
	                <th style="text-align: center; border: 2px solid #000000;">
	                	<b>{{ trans('messages.investment_plan') }}</b>
	                </th>
	                <th style="text-align: center; border: 2px solid #000000;">
	                	<b>{{ trans('messages.value') }}</b>
	                </th>
	            </tr>
	            @for($j = 0; $j < sizeof($category->investmentPlans[$i]); $j++)
	                <tr>
	                    <td style="border: 2px solid #000000;">
	                    	{{ trans('investment_plan.' . $category->investmentLabels[$j]) }}
	                    </td>
	                    <td style="border: 2px solid #000000; text-align: right;"><span style="text-align: left;">ALL </span>{{ fmod($category->investmentPlans[$i][$j], 1) ? number_format($category->investmentPlans[$i][$j], 2) : number_format($category->investmentPlans[$i][$j]) }}</td>
	                </tr>
	            @endfor
            </table>
	    @endfor
	</div>
@endforeach

<table>
    <tr>
        <th style="text-align: center; border: 2px solid #000000;"><b>{{ trans('messages.loan_repayment') }}</b></th>
        <th style="text-align: center; border: 2px solid #000000;"><b>{{ trans('messages.loan_data') }}</b></th>
    </tr>
    <tr>
        <td style="border: 2px solid #000000;">{{ trans('loan_data.yearly_interest') }}</td>
        <td style="border: 2px solid #000000; text-align: right;">{{ fmod($input[0]->loanData[0], 1) ? number_format($input[0]->loanData[0], 2) : number_format($input[0]->loanData[0]) }} %</td>
    </tr>
    <tr>
        <td style="border: 2px solid #000000;">{{trans('loan_data.years_to_pay')}}</td>
        <td style="border: 2px solid #000000; text-align: right;">{{ fmod($input[0]->loanData[1], 1) ? number_format($input[0]->loanData[1], 2) : number_format($input[0]->loanData[1]) }}</td>
    </tr>
    <tr>
        <td style="border: 2px solid #000000;">{{trans('loan_data.yearly_payments')}}</td>
        <td style="border: 2px solid #000000; text-align: right;">{{ fmod($input[0]->loanData[2], 1) ? number_format($input[0]->loanData[2], 2) : number_format($input[0]->loanData[2]) }}</td>
    </tr>
    <tr>
        <td style="border: 2px solid #000000;">{{trans('loan_data.first_payment_date')}}</td>
        <td style="border: 2px solid #000000; text-align: right;">{{ date("d-m-Y", strtotime($input[0]->loanData[3])) }}</td>
    </tr>
</table>

<br/><br/>

<table>
	<thead>
		<tr>
			<th style="text-align: center; border: 2px solid #000000;"><b>Nënprodukti</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Kategoria</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Njësi</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Rendimenti</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Prodhimi</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Të ardhura bruto për njësi</b></th>
			<th style="text-align: center; border: 2px solid #000000;"><b>Të ardhura bruto totale, viti 1</b></th>
		</tr>
	</thead>

	<tbody>
		@for($i = 0; $i < sizeof($result->cultures); $i++)
			<tr>
				<td style="border: 2px solid #000000;">{{$result->cultures[$i][0]}}</td>
				<td style="border: 2px solid #000000;">{{$result->cultures[$i][1]}}</td>
				<td style="border: 2px solid #000000; text-align: right;">{{ fmod($result->cultures[$i][2], 1) !== 0.00 ? number_format($result->cultures[$i][2], 2) : number_format($result->cultures[$i][2]) }}</td>
				<td style="border: 2px solid #000000; text-align: right;">{{ fmod($result->cultures[$i][3], 1) !== 0.00 ? number_format($result->cultures[$i][3], 2) : number_format($result->cultures[$i][3]) }}</td>
				<td style="border: 2px solid #000000; text-align: right;">{{ fmod($result->cultures[$i][4], 1) !== 0.00 ? number_format($result->cultures[$i][4], 2) : number_format($result->cultures[$i][4]) }}</td>
				<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->cultures[$i][5], 1) !== 0.00 ? number_format($result->cultures[$i][5], 2) : number_format($result->cultures[$i][5]) }}</td>
				<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->cultures[$i][6], 1) !== 0.00 ? number_format($result->cultures[$i][6], 2) : number_format($result->cultures[$i][6]) }}</td>
			</tr>
		@endfor
	</tbody>
</table>

<br />

<table>
	<tbody>
		<tr>
			<th colspan="2" style="text-align:center; border: 2px solid #000000;"><b>Përfitueshmeria e investimit</b></th>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Totali i të ardhurave, viti 1</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalIncome, 1) !== 0.00 ? number_format($result->totalIncome, 2) :  number_format($result->totalIncome )}}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Shpenzime prodhimi totale</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalExpense, 1) !== 0.00 ? number_format($result->totalExpense, 2) : number_format($result->totalExpense) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Amortizimi</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalAmortization, 1) !== 0.00 ? number_format($result->totalAmortization, 2) : number_format($result->totalAmortization) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Interesi vjetor</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->yearlyInterest, 1) !== 0.00 ? number_format($result->yearlyInterest, 2) : number_format($result->yearlyInterest) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Tatimi mbi fitimin</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->incomeTax, 1) !== 0.00 ? number_format($result->incomeTax, 2) : number_format($result->incomeTax) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Fitimi neto total</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->totalNetIncome, 1) !== 0.00 ? number_format($result->totalNetIncome, 2) : number_format($result->totalNetIncome) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Fluksi i parase i vlefshëm për pagesa kredie</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->moneyFlux, 1) !== 0.00 ? number_format($result->moneyFlux, 2) : number_format($result->moneyFlux) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">Këste kredie për 1 vit</td>
			<td style="border: 2px solid #000000; text-align: right;"><span style="float: left;">ALL </span>{{ fmod($result->firstYearCredit, 1) !== 0.00 ? number_format($result->firstYearCredit, 2) : number_format($result->firstYearCredit) }}</td>
		</tr>
		<tr>
			<td style="border: 2px solid #000000;">DSCR</td>
			<td style="border: 2px solid #000000; text-align: right;">{{ fmod($result->dscr, 1) !== 0.00 ? number_format($result->dscr, 2) : number_format($result->dscr) }}</td>
		</tr>
	</tbody>
</table>
