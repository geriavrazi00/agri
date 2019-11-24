<div id="content">
    <center>
        <h3>{{$category->name}}</h3>
    </center>

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
                            <input type="number" id="investment-{{$j}}-{{$i}}-{{$key}}" name="investment-{{$j}}-{{$i}}-{{$key}}" class="form-control" oninput="calculateTotal('{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);">
                        </td>
                    </tr>
                    @endfor
                    <tr>
                        <td>Totali</td>
                        <td>
                            <center><label id="total-investment-{{$i}}-{{$key}}">0</label></center>
                        </td>
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
                    <td>
                        <input type="number" id="business-0-{{$i}}-{{$key}}" name="business-0-{{$i}}-{{$key}}" class="form-control" min="0" {{$i == 0 ? 'required' : ''}} value="1" min="1" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');" oninput="createInvalidMsg(this, '', '');" onfocus="clearField(this, '1');" onblur="fillField(this, '1');" onkeydown="return blockSpecialCharactersInInputNumber(event);" disabled>
                    </td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][1]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-1-{{$i}}-{{$key}}" name="business-1-{{$i}}-{{$key}}" style="padding: 0px; border-radius: 5px;" 
                        {{$i == 0 ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.technology_required')}}')" onchange="this.setCustomValidity('');" disabled>
                            <option value="">{{trans('messages.none')}}</option>
                            @for($j = 0; $j < sizeof($technologies); $j++) 
                                <option value="{{$technologies[$j]->id}}">{{$technologies[$j]->name}}</option>
                            @endfor
                        </select>
                    </td>
                </tr>

                @for($j = 0; $j < $category->culture_number; $j++)
                    <tr>
                        <td>{{trans('business_data.' . $category['business'][$j+2]->value)}}</td>
                        <td>
                            <select class="form-control" id="business-{{$j+2}}-{{$i}}-{{$key}}" name="business-{{$j+2}}-{{$i}}-{{$key}}" style="padding: 0px; border-radius: 5px;" {{($i == 0 && $j == 0) ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.one_subculture_required')}}')" onchange="businessDataValidation(this, '{{$category->culture_number}}', '{{$i}}', '{{$key}}')" disabled>
                                <option value="">{{trans('messages.none')}}</option>
                                @for($k = 0; $k < sizeof($category->cultures); $k++)
                                    <option value="{{$category->cultures[$k]->id}}">
                                        {{$category->cultures[$k]->name}}
                                    </option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                @endfor
            </table>
        @endfor
    </div>
</div>