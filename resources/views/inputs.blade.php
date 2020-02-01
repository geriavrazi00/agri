<center>
    <h3>{{$category->name}}</h3>
</center>

<div class="table card-body col-md-8" style="background-color: white; margin: auto;">
    @for($i = 0; $i < $category->option_number; $i++)
        <div style="margin: auto;">
            <table id="businessinputtable{{$key}}{{$i}}" class="resulttable display responsive" style="width: 100%;">
                <thead>
                    <tr class="resulttablerow">
                        <th class="resulttablehead">{{trans('messages.business_data')}}</th>
                        <th class="resulttablehead">Vlerat</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans('business_data.' . $category['business'][0]->value)}}</td>
                        <td class="resulttabledata">
                            <input type="number" id="business-0-{{$i}}-{{$key}}" name="business-0-{{$i}}-{{$key}}" class="form-control" min="0" {{$i == 0 ? 'required' : ''}} value="1" min="1" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');" oninput="createInvalidMsg(this, '', '');" onfocus="clearField(this, '1');" onblur="fillField(this, '1');" onkeydown="return blockSpecialCharactersInInputNumber(event);" disabled style="text-align: right">
                        </td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans('business_data.' . $category['business'][1]->value)}}</td>
                        <td class="resulttabledata">
                            <select class="form-control" id="business-1-{{$i}}-{{$key}}" name="business-1-{{$i}}-{{$key}}" style="border-radius: 5px;" {{$i == 0 ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.technology_required')}}')" onchange="this.setCustomValidity('');" disabled>
                                <option value="">{{trans('messages.choose')}}</option>
                                @for($j = 0; $j < sizeof($technologies); $j++) <option value="{{$technologies[$j]->id}}">{{$technologies[$j]->name}}</option>
                                    @endfor
                            </select>
                        </td>
                    </tr>

                    @for($j = 0; $j < $category->culture_number; $j++)
                        <tr class="resulttablerow">
                            <td class="resulttabledata"> {{trans('business_data.' . $category['business'][$j+2]->value)}}</td>
                            <td class="resulttabledata">
                                <select class="form-control" id="business-{{$j+2}}-{{$i}}-{{$key}}" name="business-{{$j+2}}-{{$i}}-{{$key}}" style="border-radius: 5px;" {{($i == 0 && $j == 0) ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.one_subculture_required')}}')" onchange="businessDataValidation(this, '{{$category->culture_number}}', '{{$i}}', '{{$key}}')" disabled>
                                    <option value="">{{trans('messages.choose')}}</option>
                                    @for($k = 0; $k < sizeof($category->cultures); $k++)
                                        <option value="{{$category->cultures[$k]->id}}">
                                            {{$category->cultures[$k]->name}}
                                        </option>
                                        @endfor
                                </select>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    @endfor

    <br/>

    @for($i = 0; $i < $category->option_number; $i++)
        <div style="margin: auto;">
            <table id="planinputtable{{$key}}{{$i}}" class="resulttable display responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th>{{trans('messages.investment_plan')}}</th>
                        <th>{{trans('messages.total_value')}}</th>
                        <th>{{trans('messages.financing_bank')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @for($j = 0; $j < sizeof($category['investments']); $j++)
                        <tr>
                            <td>{{trans('investment_plan.' . $category['investments'][$j]->value)}}</td>
                            <td>
                                <input type="number" id="investment-0-{{$j}}-{{$i}}-{{$key}}" name="investment-0-{{$j}}-{{$i}}-{{$key}}" class="form-control" style="text-align: right" oninput="calculateTotal(0, '{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="* Vendosni vlerën në Lekë">
                            </td>
                            <td>
                                <input type="number" id="investment-1-{{$j}}-{{$i}}-{{$key}}" name="investment-1-{{$j}}-{{$i}}-{{$key}}" class="form-control" style="text-align: right" oninput="calculateTotal(1, '{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="* Vendosni vlerën në Lekë">
                            </td>
                        </tr>
                    @endfor
                    <tr>
                        <td>Totali</td>
                        <td>
                            <center><label id="total-investment-0-{{$i}}-{{$key}}">0</label></center>
                        </td>
                        <td>
                            <center><label id="total-investment-1-{{$i}}-{{$key}}">0</label></center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endfor
</div>

