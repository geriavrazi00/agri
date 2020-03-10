<div class="table card-body col-md-8" style="background-color: white; margin: auto;">
    <table id="loaninput" class="resulttable display responsive" style="width: 100%;">
        <thead>
            <tr>
                <th>{{trans('messages.loan_repayment')}}</th>
                <th>{{trans('messages.loan_data_1')}}</th>
                <th>{{trans('messages.loan_data_2')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{trans('loan_data.loan_sum')}}</td>
                <td>
                    <input type="text" id="total-loan-0" name="total-loan-0" class="form-control" required oninvalid="validateLoanTotals(this, '{{trans('validation.sum_of_loan')}}', '{{$categories}}');" oninput="validateLoanTotals(this, '{{trans('validation.sum_of_loan')}}', '{{$categories}}');" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number" style="text-align: right"/>
                </td>
                <td>
                    <input type="text" id="total-loan-1" name="total-loan-1" class="form-control" required oninvalid="validateLoanTotals(this, '{{trans('validation.sum_of_loan')}}', '{{$categories}}');" oninput="validateLoanTotals(this, '{{trans('validation.sum_of_loan')}}', '{{$categories}}');" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillLoanField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number" style="text-align: right"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.yearly_interest')}}</td>
                <td>
                    <div class="input-group">
                        <input type="number" id="loan-0-0" name="loan-0-0" class="form-control" required oninvalid="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}');" oninput="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}')" onkeydown="return blockSpecialCharactersInInputNumber(event);" min="0" max="100" placeholder="{{ trans('messages.annual_interest_percentage') }}" step=".000001" style="text-align: right; margin-right: 3px;"/>
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <input type="number" id="loan-0-1" name="loan-0-1" class="form-control" oninvalid="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}');" oninput="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}')" onkeydown="return blockSpecialCharactersInInputNumber(event);" min="0" max="100" placeholder="{{ trans('messages.annual_interest_percentage') }}" step=".000001" style="text-align: right; margin-right: 3px;"/>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.years_to_pay')}}</td>
                <td>
                    <input type="number" id="loan-1-0" name="loan-1-0" class="form-control" required oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.period_in_years') }}" style="text-align: right"/>
                </td>
                <td>
                    <input type="number" id="loan-1-1" name="loan-1-1" class="form-control" oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.period_in_years') }}" style="text-align: right"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.yearly_payments')}}</td>
                <td>
                    <input type="number" id="loan-2-0" name="loan-2-0" class="form-control" required oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.payments_per_year') }}" style="text-align: right"/>
                </td>
                <td>
                    <input type="number" id="loan-2-1" name="loan-2-1" class="form-control" oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.payments_per_year') }}" style="text-align: right"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.first_payment_date')}}</td>
                <td>
                    <input type='text' id="loan-3-0" name="loan-3-0" class="datepicker-here form-control" data-position="right bottom" data-language="{{ App::getLocale() }}" required oninvalid="createInvalidMsg(this, '{{trans('validation.first_payment_date_required')}}', '');" oninput="createInvalidMsg(this, '', '');" placeholder="{{ trans('messages.date_of_first_payment') }}" style="text-align: right"/>
                </td>
                <td>
                    <input type='text' id="loan-3-1" name="loan-3-1" class="datepicker-here form-control" data-position="right bottom" data-language="{{ App::getLocale() }}" oninvalid="createInvalidMsg(this, '{{trans('validation.first_payment_date_required')}}', '');" oninput="createInvalidMsg(this, '', '');" placeholder="{{ trans('messages.date_of_first_payment') }}" style="text-align: right"/>
                </td>
            </tr>
        </tbody>
    </table>
</div>
