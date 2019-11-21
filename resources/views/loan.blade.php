<table class="table">
    <tr>
        <th>{{trans('messages.loan_repayment')}}</th>
        <th>{{trans('messages.loan_data')}}</th>
    </tr>
    <tr>
        <td>{{trans('loan_data.loan_sum')}}</td>
        <td><center><label id="total-loan">0</label></center></td>
    </tr>
    <tr>
        <td>{{trans('loan_data.yearly_interest')}}</td>
        <td>
            <input type="number" id="loan-0" name="loan-0" class="form-control" required>
            <span class="invalid-feedback" role="alert">
                <strong>{{trans('validation.interest_rate_required')}}</strong>
            </span>
        </td>
    </tr>
    <tr>
        <td>{{trans('loan_data.years_to_pay')}}</td>
        <td>
            <input type="number" id="loan-1" name="loan-1" class="form-control" required>
            <span class="invalid-feedback" role="alert">
                <strong>{{trans('validation.repayment_period_required')}}</strong>
            </span>
        </td>
    </tr>
    <tr>
        <td>{{trans('loan_data.yearly_payments')}}</td>
        <td>
            <input type="number" id="loan-2" name="loan-2" class="form-control" required>
            <span class="invalid-feedback" role="alert">
                <strong>{{trans('validation.yearly_payments_required')}}</strong>
            </span>
        </td>
    </tr>
    <tr>
        <td>{{trans('loan_data.first_payment_date')}}</td>
        <td>
            <input type="date" id="loan-3" name="loan-3" class="form-control" required>
            <span class="invalid-feedback" role="alert">
                <strong>{{trans('validation.first_payment_date_required')}}</strong>
            </span>
        </td>
    </tr>
</table>