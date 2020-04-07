@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 20px;">
	<div class="row justify-content-center">
        <div class="col-md-9" style="padding-top: 56px;">
            <center>
                <div style="display: inline-flex; text-align: center;">
                    <h3 class="resulttablehead">{{ trans('messages.results') }}</h3>
                </div>
            </center>

            <br/>

            <div class="table card-body" style="background-color: white; margin: auto;">
                <div style="text-align: center;">
                    <div class="col-md-12">
                        <b>{{ trans('messages.applicant_name') }}:</b> {{$applicant}}
                    </div>

                    <div class="col-md-12">
                        <b>{{ trans('messages.business_code') }}:</b> {{$businessCode}}
                    </div>

                    <div class="col-md-12">
                        <b>{{ trans('messages.application_date') }}:</b> {{$date}}
                    </div>
                </div>

                <br/>

                <table id="resulttable1" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <tr class="resulttablerow">
                            <th class="resulttablehead">{{ trans('messages.subproduct') }}</th>
                            <th class="resulttablehead">{{ trans('messages.category') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.unit') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.productivity') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.production') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.price') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.gross_income') }}</th>
                            <th class="resulttablehead" style="text-align: right;">{{ trans('messages.total_gross_income') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i = 0; $i < sizeof($result->getCultures()); $i++)
                            <tr class="resulttablerow">
                                <td class="resulttabledata">{{ trans($result->getCultures()[$i][0]) }}</td>
                                <td class="resulttabledata">{{ trans($result->getCultures()[$i][1]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][2], 1) ? number_format($result->getCultures()[$i][2], 2) : number_format($result->getCultures()[$i][2]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][3], 1) ? number_format($result->getCultures()[$i][3], 2) : number_format($result->getCultures()[$i][3]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getCultures()[$i][4], 1) ? number_format($result->getCultures()[$i][4], 2) : number_format($result->getCultures()[$i][4]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getCultures()[$i][5], 1) ? number_format($result->getCultures()[$i][5], 2) : number_format($result->getCultures()[$i][5]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getCultures()[$i][6], 1) ? number_format($result->getCultures()[$i][6], 2) : number_format($result->getCultures()[$i][6]) }}</td>
                                <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getCultures()[$i][7], 1) ? number_format($result->getCultures()[$i][7], 2) : number_format($result->getCultures()[$i][7]) }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <br />

                <table id="resulttable2" class="resulttable display responsive nowrap" style="width: 100%;">
                    <thead>
                        <th class="resulttablehead">{{ trans('messages.investment_profitability') }}</th>
                        <th class="resulttablehead" style="text-align: right;">{{ trans('messages.result_of_profitability') }}</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.total_revenue') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalIncome(), 1) !== 0.00 ? number_format($result->getTotalIncome(), 2) : number_format($result->getTotalIncome()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.total_production_costs') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalExpense(), 1) !== 0.00 ? number_format($result->getTotalExpense(), 2) : number_format($result->getTotalExpense()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.depreciation') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalAmortization(), 1) !== 0.00 ? number_format($result->getTotalAmortization(), 2) : number_format($result->getTotalAmortization()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.annual_interest') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getYearlyInterest(), 1) !== 0.00 ? number_format($result->getYearlyInterest(), 2) : number_format($result->getYearlyInterest()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.profit_before_tax') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getIncomeBeforeTax(), 1) !== 0.00 ? number_format($result->getIncomeBeforeTax(), 2) : number_format($result->getIncomeBeforeTax()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.profit_tax') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getIncomeTax(), 1) !== 0.00 ? number_format($result->getIncomeTax(), 2) : number_format($result->getIncomeTax()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.total_net_profit') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getTotalNetIncome(), 1) !== 0.00 ? number_format($result->getTotalNetIncome(), 2) : number_format($result->getTotalNetIncome()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.cash_flow') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getMoneyFlux(), 1) !== 0.00 ? number_format($result->getMoneyFlux(), 2) : number_format($result->getMoneyFlux()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.loan_installments') }}</td>
                            <td class="resulttabledata" style="text-align: right;">ALL {{ fmod($result->getFirstYearCredit(), 1) !== 0.00 ? number_format($result->getFirstYearCredit(), 2) : number_format($result->getFirstYearCredit()) }}</td>
                        </tr>
                        <tr>
                            <td class="resulttabledata">{{ trans('messages.dscr') }}</td>
                            <td class="resulttabledata" style="text-align: right;">{{ fmod($result->getDscr(), 1) !== 0.00 ? number_format($result->getDscr(), 2) : number_format($result->getDscr()) }}</td>
                        </tr>
                    </tbody>
                </table>

                <br/>

                <div class="col-md-12" style="text-align: right;">
                    @can(App\Constants::CREATE_PLAN)
                        <form method="POST" action="/plans/save" style="display: inline; margin: 0px;">
                            @csrf
                            <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                            <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                            <input type="hidden" id="date" name="date" value="{{ $date }}" />

                            <button type="submit" class="btn btn-primary">{{ trans('messages.save_project') }}</button>
                        </form>
                    @endcan

                    <form method="POST" action="/export/excel" style="display: inline; margin: 0px;">
                        @csrf
                        <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                        <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                        <input type="hidden" id="date" name="date" value="{{ $date }}" />

                        <button type="submit" class="btn btn-success">{{ trans('messages.excel_export') }}</button>
                    </form>

                    <form method="POST" action="/export/pdf" style="display: inline; margin: 0px;">
                        @csrf
                        <input type="hidden" id="inputs" name="inputs" value="{{ $inputs }}" />
                        <input type="hidden" id="result" name="result" value="{{ json_encode($result->convertToJson()) }}" />
                        <input type="hidden" id="date" name="date" value="{{ $date }}" />

                        <button type="submit" class="btn btn-info">{{ trans('messages.pdf_export') }}</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
