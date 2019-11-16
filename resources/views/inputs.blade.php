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
                        <input type="number" id="investment-{{$j}}-{{$i}}" name="investment-{{$j}}-{{$i}}" class="form-control" oninput="calculateTotal('{{$i}}', '{{$category->option_number}}', '{{sizeof($category['investments'])}}')">
                    </td>
                    </tr>
                    @endfor
                    <tr>
                        <td>Totali</td>
                        <td>
                            <center><label id="total-investment-{{$i}}">0</label></center>
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
                    <td><input type="number" name="business-0-{{$i}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>{{trans('business_data.' . $category['business'][1]->value)}}</td>
                    <td>
                        <select class="form-control" id="business-1-{{$i}}" name="business-1-{{$i}}" style="padding: 0px; border-radius: 5px;">
                            <option value="null">{{trans('messages.none')}}</option>
                            @for($j = 0; $j < sizeof($technologies); $j++) <option value="{{$technologies[$j]->id}}">{{$technologies[$j]->name}}</option>
                                @endfor
                        </select> -->
                    </td>
                </tr>

                @for($j = 0; $j < $category->culture_number; $j++)
                    <tr>
                        <td>{{trans('business_data.' . $category['business'][$j+2]->value)}}</td>
                        <td>
                            <select class="form-control" id="business-{{$j+2}}-{{$i}}" name="business-{{$j+2}}-{{$i}}" style="padding: 0px; border-radius: 5px;">
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