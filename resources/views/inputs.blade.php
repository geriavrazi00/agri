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
                @for($j = 0; $j < sizeof($category['investments']); $j++) <tr>
                    <td>{{trans('investment_plan.' . $category['investments'][$j]->value)}}</td>
                    <td>
                        <input type="number" id="investment-{{$j}}-{{$i}}-{{$key}}" name="investment-{{$j}}-{{$i}}-{{$key}}" class="form-control" oninput="calculateTotal('{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this);" onblur="fillField(this);">

                        <span class="invalid-feedback" role="alert">
                            <strong>{{trans('validation.non_negative_field')}}</strong>
                        </span>
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
                        <input type="number" name="business-0-{{$i}}-{{$key}}" class="form-control" required min="0">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{trans('validation.field_required')}}</strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][1]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-1-{{$i}}-{{$key}}" name="business-1-{{$i}}-{{$key}}" style="padding: 0px; border-radius: 5px;" required>
                            <option value="">{{trans('messages.none')}}</option>
                            @for($j = 0; $j < sizeof($technologies); $j++) 
                                <option value="{{$technologies[$j]->id}}">{{$technologies[$j]->name}}</option>
                            @endfor
                        </select> -->

                        <span class="invalid-feedback" role="alert">
                            <strong>{{trans('validation.technology_required')}}</strong>
                        </span>
                    </td>
                </tr>

                @for($j = 0; $j < $category->culture_number; $j++)
                    <tr>
                        <td>{{trans('business_data.' . $category['business'][$j+2]->value)}}</td>
                        <td>
                            <select class="form-control" id="business-{{$j+2}}-{{$i}}-{{$key}}" name="business-{{$j+2}}-{{$i}}-{{$key}}" style="padding: 0px; border-radius: 5px;">
                                <option value="null">{{trans('messages.none')}}</option>
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