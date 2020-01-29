<div class="table card-body col-md-12" style="background-color: white; margin: auto;">
    <table id="loaninput" class="resulttable display responsive nowrap" style="width: 100%;">
        <thead>
            <tr>
                <th>{{trans('messages.loan_repayment')}}</th>
                <th>{{trans('messages.loan_data')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{trans('loan_data.loan_sum')}}</td>
                <td><center><label id="total-loan">0</label></center></td>
            </tr>
            <tr>
                <td>{{trans('loan_data.yearly_interest')}}</td>
                <td>
                    <input type="number" id="loan-0" name="loan-0" class="form-control" style="text-align: right" required oninvalid="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}');" oninput="loanInterestRateValidation(this, 0, 100, '{{trans('validation.interest_rate_required')}}', '{{trans('validation.interest_min_value', ['value' => 0])}}', '{{trans('validation.interest_max_value', ['value' => 100])}}')" onkeydown="return blockSpecialCharactersInInputNumber(event);" min="0" max="100" placeholder="* Vendosni normën vjetore në %"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.years_to_pay')}}</td>
                <td>
                    <input type="number" id="loan-1" name="loan-1" class="form-control" style="text-align: right" required oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="* Vendosni periudhën në vite"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.yearly_payments')}}</td>
                <td>
                    <input type="number" id="loan-2" name="loan-2" class="form-control" style="text-align: right" required oninvalid="createInvalidMsg(this, '{{trans('validation.repayment_period_required')}}', '');" oninput="createInvalidMsg(this, '', '');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="* Vendosni numrin e pagesave në vit"/>
                </td>
            </tr>
            <tr>
                <td>{{trans('loan_data.first_payment_date')}}</td>
                <td>
                    <input type='text' id="loan-3" name="loan-3" class="datepicker-here form-control" data-language="sq" required oninvalid="createInvalidMsg(this, '{{trans('validation.first_payment_date_required')}}', '');" oninput="createInvalidMsg(this, '', '');" placeholder="* Zgjidhni datën e këstit të parë"/>
                </td>
            </tr>
        </tbody>
    </table>
</div>
