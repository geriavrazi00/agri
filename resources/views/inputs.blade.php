<div id="content">
    <div style="display: flex;">
        @for($i = 0; $i < $category->option_number; $i++)
            <table class="table">
                <tr>
                    <th>{{trans('messages.investment_plan')}}</th>
                    <th>{{trans('messages.value')}}</th>
                </tr>
                @for($j = 0; $j < sizeof($category['investments']); $j++)
                    <tr>
                        <td>{{trans('investment_plan.' . $category['investments'][$j]->value)}}</td>
                        <td>
                            <input type="number" id="investment-{{$j}}-{{$i}}" name="investment-{{$j}}-{{$i}}" class="form-control" oninput="calculateTotal('{{$i}}', '{{$category->option_number}}', '{{sizeof($category['investments'])}}')">
                        </td>
                    </tr>
                @endfor
                <tr>
                    <td>Totali</td>
                    <td><center><label id="total-investment-{{$i}}">0</label></center></td>
                </tr>
            </table>
        @endfor
    </div>

    <div style="display: flex;">
        @for($i = 0; $i < $category->option_number; $i++)
            <table class="table">
                <tr>
                    <th colspan="2">{{trans('messages.business_data')}}</th>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][0]->value)}}</td>
                    <td><input type="number" name="business-0-{{$i}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][1]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-1-{{$i}}" name="business-1-{{$i}}">
                            <option value="null">{{trans('messages.none')}}</option>
                            @for($j = 0; $j < sizeof($technologies); $j++)
                                <option value="{{$technologies[$j]->id}}">{{$technologies[$j]->name}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][2]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-2-{{$i}}" name="business-2-{{$i}}">
                            <option value="null">{{trans('messages.none')}}</option>
                            @for($j = 0; $j < sizeof($cultures); $j++)
                                <option value="{{$cultures[$j]->id}}">{{$cultures[$j]->name}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][3]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-3-{{$i}}" name="business-3-{{$i}}">
                            <option value="null">{{trans('messages.none')}}</option>
                           @for($j = 0; $j < sizeof($cultures); $j++)
                                <option value="{{$cultures[$j]->id}}">{{$cultures[$j]->name}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
            </table>
        @endfor
    </div>

    <div>
        <table class="table">
            <tr>
                <th>{{trans('messages.loan_repayment')}}</th>
                <th>{{trans('messages.loan_data')}}</th>
            </tr>
            <tr>
                <td>{{trans('loan_data.' . $category['loans'][0]->value)}}</td>
                <td><center><label id="total-loan">0</label></center></td>
            </tr>
            <tr>
                <td>{{trans('loan_data.' . $category['loans'][1]->value)}}</td>
                <td><input type="number" id="loan-0" name="loan-0" class="form-control"></td>
            </tr>
            <tr>
                <td>{{trans('loan_data.' . $category['loans'][2]->value)}}</td>
                <td><input type="number" id="loan-1" name="loan-1" class="form-control"></td>
            </tr>
            <tr>
                <td>{{trans('loan_data.' . $category['loans'][3]->value)}}</td>
                <td><input type="number" id="loan-2" name="loan-2" class="form-control"></td>
            </tr>
            <tr>
                <td>{{trans('loan_data.' . $category['loans'][4]->value)}}</td>
                <td><input type="date" id="loan-3" name="loan-3" class="form-control"></td>
            </tr>
        </table>
    </div>

    
</div>