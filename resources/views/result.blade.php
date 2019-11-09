@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{trans('messages.result')}}</div>

                <div class="card-body">
	                <table border="1">
	                	<tr>
	                		<th>Kultura</th>
	                		<th>Siperfaqe (dy)</th>
	                		<th>Rendimenti (kg/dy)</th>
	                		<th>Prodhimi (kg)</th>
	                		<th>Ardhura bruto per njesi (leke/dy)</th>
	                		<th>Ardhura bruto totale (leke)</th>
	                		<th>Shpenzime prodhimi</th>
	                	</tr>
	                	
	            		@for($i = 0; $i < sizeof($result->getCultures()); $i++)
	            			<tr>
	            				<td>{{$result->getCultures()[$i][0]}}</td>
	            				<td>{{$result->getCultures()[$i][1]}}</td>
	            				<td>{{$result->getCultures()[$i][2]}}</td>
	            				<td>{{$result->getCultures()[$i][3]}}</td>
	            				<td>{{$result->getCultures()[$i][4]}}</td>
	            				<td>{{$result->getCultures()[$i][5]}}</td>
	            				<td>{{$result->getCultures()[$i][6]}}</td>
	            			</tr>
	            		@endfor	
	                </table>

	                <br/>

	                <table border="1">
	                	<tr>
	                		<td>Totali i te ardhurave viti 1</td>
	                		<td>{{$result->getTotalIncome()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Shpenzime prodhimi totale ne ferme</td>
	                		<td>{{$result->getTotalExpense()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Amortizimi stalles</td>
	                		<td>{{$result->getTotalAmortization()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Interesi vjetor</td>
	                		<td>{{$result->getYearlyInterest()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Tatimi mbi fitimin (mesatarisht 7.5%)</td>
	                		<td>{{$result->getIncomeTax()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Fitimi neto total (leke)</td>
	                		<td>{{$result->getTotalNetIncome()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Fluksi i parase i vlefshem per pagesa kredie</td>
	                		<td>{{$result->getMoneyFlux()}}</td>
	                	</tr>
	                	<tr>
	                		<td>Keste kredie per 1 vit</td>
	                		<td>{{$result->getFirstYearCredit()}}</td>
	                	</tr>
	                	<tr>
	                		<td>DSCR (Debt Service Coverage Ratio)</td>
	                		<td>{{$result->getDscr()}}</td>
	                	</tr>
	                </table>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection