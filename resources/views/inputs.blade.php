<center>
    <h3>{{ trans($category->name) }}</h3>
</center>

<div class="table card-body col-md-8" style="background-color: white; margin: auto;">
    @for($i = 0; $i < $category->option_number; $i++)
        <div style="margin: auto;">
            <table id="businessinputtable{{$key}}{{$i}}" class="resulttable display responsive" style="width: 100%;">
                <thead>
                    <tr class="resulttablerow">
                        <th class="resulttablehead">{{ trans('messages.business_data') }}{{$category->option_number > 1 ? " - " . (trans('messages.the_greenhouse') . " " . ($i + 1)) : ''}}</th>
                        <th class="resulttablehead">{{ trans('messages.values') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans($category['business'][0]->value)}}</td>
                        <td class="resulttabledata">
                            <input type="text" id="business-0-{{$i}}-{{$key}}" name="business-0-{{$i}}-{{$key}}" class="form-control" min="0" {{$i == 0 ? 'required' : ''}} value="1" min="1" oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.non_negative_field')}}');" oninput="createInvalidMsg(this, '', '');" onfocus="clearField(this, '1');" onblur="fillField(this, '1');" onkeydown="return blockSpecialCharactersInInputNumber(event);" disabled style="text-align: right" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number">
                        </td>
                    </tr>
                    <tr class="resulttablerow">
                        <td class="resulttabledata">{{trans($category['business'][1]->value)}}</td>
                        <td class="resulttabledata">
                            <select class="form-control" id="business-1-{{$i}}-{{$key}}" name="business-1-{{$i}}-{{$key}}" style="border-radius: 5px;" {{$i == 0 ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.technology_required')}}')" onchange="this.setCustomValidity('');" disabled>
                                <option value="">{{trans('messages.choose')}}</option>
                                @for($j = 0; $j < sizeof($technologies); $j++)
                                    <option value="{{$technologies[$j]->id}}">{{ trans($technologies[$j]->name) }}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>

                    @for($j = 0; $j < $category->culture_number; $j++)
                        <tr class="resulttablerow">
                            <td class="resulttabledata"> {{ trans($category['business'][$j+2]->value) }}</td>
                            <td class="resulttabledata">
                                <select class="form-control" id="business-{{$j+2}}-{{$i}}-{{$key}}" name="business-{{$j+2}}-{{$i}}-{{$key}}" style="border-radius: 5px;" {{($i == 0 && $j == 0) ? 'required' : ''}} oninvalid="this.setCustomValidity('{{trans('validation.one_subculture_required')}}')" onchange="businessDataValidation(this, '{{$category->culture_number}}', '{{$i}}', '{{$key}}', '{{$category->option_number}}')" disabled>
                                    <option value="">{{trans('messages.choose')}}</option>
                                    @for($k = 0; $k < sizeof($category->cultures); $k++)
                                        <option value="{{$category->cultures[$k]->id}}">
                                            {{ trans($category->cultures[$k]->name) }}
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
                        <th>{{trans('messages.investment_plan')}}{{$category->option_number > 1 ? " - " . (trans('messages.the_greenhouse') . " " . ($i + 1)) : ''}}</th>
                        <th>{{trans('messages.total_value')}}</th>
                        <th>{{trans('messages.financing_bank')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @for($j = 0; $j < sizeof($category['investments']); $j++)
                        <tr>
                            <td>
                                <div style="display: flex;">
                                    {{ trans( $category['investments'][$j]->value) }}

                                    @if($category['investments'][$j]->extra_data)
                                        {{-- <input type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$category->id}}{{$category->option_number}}"/>
                                        --}}

                                        @if($agent->isDesktop() && $category->option_number > 1)
                                            <span>&ensp;{{ strtolower(trans('messages.extra_greenhouse')) }}&ensp;</span>
                                        @endif

                                        &ensp;
                                        <input type="text" id="investment-extra-{{$j}}-{{$i}}-{{$key}}"
                                        name="investment-extra-{{$j}}-{{$i}}-{{$key}}" class="form-control col-md-2"
                                        style="text-align: right; height: auto;" value="0" min="0" onfocus="clearField(this, '0');"
                                        onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);"
                                        pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number" />

                                        @if($agent->isDesktop() && $category->option_number == 1)
                                            <span>&ensp;{{ trans('messages.extra_sheep') }}</span>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td>
                                <input type="text" id="investment-0-{{$j}}-{{$i}}-{{$key}}" name="investment-0-{{$j}}-{{$i}}-{{$key}}" class="form-control" style="text-align: right" oninput="calculateTotal(0, '{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.value_in_all') }}" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number">
                            </td>
                            <td>
                                <input type="text" id="investment-1-{{$j}}-{{$i}}-{{$key}}" name="investment-1-{{$j}}-{{$i}}-{{$key}}" class="form-control" style="text-align: right" oninput="calculateTotal(1, '{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.value_in_all') }}" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number">
                            </td>
                        </tr>
                    @endfor
                    <tr>
                        <td>{{ trans('messages.total') }}</td>
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

        {{-- @for($j = 0; $j < sizeof($category['investments']); $j++)
            @if($category['investments'][$j]->extra_data)
                <div class="modal fade" id="exampleModal{{$category->id}}{{$category->option_number}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 10px; color: black; padding-top: 5px;">
                                    New message
                                </h5>
                            </div>
                            <div class="modal-body" style="background: white;">
                                <form>
                                    <div class="form-group">
                                        <label for="investment-extra-{{$j}}-{{$i}}-{{$key}}" class="col-form-label">Extra data:</label>
                                        <input type="text" id="investment-extra-{{$j}}-{{$i}}-{{$key}}" name="investment-extra-{{$j}}-{{$i}}-{{$key}}" class="form-control" style="text-align: right" oninput="calculateTotal(0, '{{$category->option_number}}', '{{sizeof($category['investments'])}}', '{{$category->id}}', '{{$categories}}')" value="0" min="0" onfocus="clearField(this, '0');" onblur="fillField(this, '0');" onkeydown="return blockSpecialCharactersInInputNumber(event);" placeholder="{{ trans('messages.value_in_all') }}" pattern="{{ App\Constants::REG_EX_CURRENCY }}" data-type="number">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer" style="background: white;">

                                <button type="button" class="btn btn-primary" data-dismiss="modal">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor --}}
    @endfor


</div>

