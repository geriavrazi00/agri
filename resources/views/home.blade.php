@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="hero" style="padding: 20px; height: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
            <form method="GET" action="/result" style="width: 100%;">
                <input type="hidden" id="date" name="date" value="{{date('d-m-Y H:i:s')}}" />
                @csrf

                <div id="applicant-name-div" style="padding-top: 56px; text-align: center;">
                    {{-- <table id="namenipt">
                        <tr>
                            <td style="float:right;"><label for="applicant-name" id="applicantname" style="font-weight: 700;">{{trans('messages.applicant_name')}}</label></td>
                            <td><input class="form-control" id="applicantnameinput" type="text" name="applicant-name" required oninvalid="createInvalidMsg(this, '{{trans('validation.applicant_name_required')}}', '');" oninput="createInvalidMsg(this, '', '');" /></td>
                        </tr>
                        <tr>
                            <td style="float:right;"><label for="business-code" id="applicantname" style="font-weight: 700;">NIPT/Kodi i fermerit</label></td>
                            <td><input class="form-control" id="applicantnameinput" type="text" name="business-code" required oninvalid="createInvalidMsg(this, '{{trans('validation.business_code_required')}}', '');" oninput="createInvalidMsg(this, '', '');" /></td>
                        </tr>
                    </table> --}}

                    <div class="col-md-12">
                        <label id="applicantname" style="font-weight: 700;">{{trans('messages.applicant_name')}}</label>
                        <input id="applicantnameinput" type="text" name="applicant-name" required oninvalid="createInvalidMsg(this, '{{trans('validation.applicant_name_required')}}', '');" oninput="createInvalidMsg(this, '', '');" />
                    </div>

                    <br/>

                    <div class="col-md-12">
                        <label id="applicantname" style="font-weight: 700;">NIPT/Kodi i fermerit</label>
                        <input id="applicantnameinput" type="text" name="business-code" required oninvalid="createInvalidMsg(this, '{{trans('validation.business_code_required')}}', '');" oninput="createInvalidMsg(this, '', '');" />
                    </div>
                </div>

                <br />

                <!-- Order Wizard Start -->
                <div id="orderWizard">
                    <!-- Calculator Table Start -->
                    <div id="calcTable">
                        <!-- Responsive Table Start -->
                        <div class="rtable rtable--collapse">
                            <!-- Table Heading Start -->
                            <div class="rtable-row rtable-row--head col-md-10" style="margin: auto;">
                                <div class="rtable-cell item-cell column-heading" style="text-align: center;">Zgjidhni kategorine e investimit</div>
                            </div>
                            <!-- Table Heading End -->
                            <!--Short table information-->
                            <div id="tabledesc" class="col-md-10" style="margin: auto;">
                                <p>
                                    Aktivitetet bujqesore kane intensitete zhvillimi te ndryshme bazuar ne pozicionin gjeografik te fermes, sherbimeve
                                    agroteknike qe perdor, menyren e kultivimit (intensive apo tradicionale), faktoreve klimaterik etj.
                                    Kjo platforme te mundeson te perzgjedhesh nivelin operues te fermes
                                </p>

                            </div>

                            <div class="row col-md-10" style="margin: auto;">
                                @for($i = 0; $i < sizeof($categories); $i++)
                                    <div class="col-md-3" style="text-align: center;">
                                        <div class="button" id="category-{{$categories[$i]->id}}-button" style="text-align: -webkit-center;">
                                            <div id="category-{{$categories[$i]->id}}-div" class="rtable-cell item-cell-type">
                                                <a onclick="selectCategories('{{$categories[$i]}}', '{{$categories}}');" style="cursor: pointer;">
                                                    <img src="img/product-images/{{$categories[$i]->image}}" style="width:100px; height:100px;" />
                                                </a>
                                                <input class="form-control in-odd-row item-name" hidden name="item-name-1" type="text" value="Product or Service Name 1" />
                                            </div>
                                            <div>
                                                <p id="servicename">{{$categories[$i]->name}}</p>
                                            </div>
                                        </div>
                            </div>
                            @endfor
                        </div>

                        <br />

                        <div class="divider">
                            <div class="dividermask"></div>
                        </div>

                        @foreach($categoriesData as $key => $category)
                        @if($category['investments'] != null)
                        <div id="category-{{$key}}" style="display: none; width: 100%;">
                            <div id="category-{{$key}}-anchor" style="width: 100%; padding-top: 56px;"></div>
                            @include('inputs')
                        </div>
                        @endif
                        @endforeach

                        <br /><br />

                        <div id="loan" style="display: none; width: 100%; padding-top: 20px;">
                            @include('loan')

                            <input type="hidden" id="selected-categories[]" name="selected-categories[]" />
                            <br />
                            <center>
                                <button id="submitbutton" class="btn btn-primary" type="submit">
                                    {{trans('messages.generate')}}
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- <div class="rtable rtable--collapse" style="display: none;">
        <!-- Table Heading Start -->
        <div class="rtable-row rtable-row--head">
            <div class="rtable-cell item-cell column-heading" style="text-align:center">{{trans('messages.enter_data')}}</div>
</div>
<!-- Table Heading End -->
<div class="card-body">
    <form method="POST" action="/result">
        @csrf
        <label for="applicant-name">{{trans('messages.applicant_name')}}</label>
        <input class="form-control" type="text" name="applicant-name" />

        <label for="farm-type">{{trans('messages.farm_type')}}</label>
        <select class="form-control" id="farm-type" name="farm-type" onchange="chooseCategory();">
            <option value="null">{{trans('messages.none')}}</option>
            @for($i = 0; $i < sizeof($categories); $i++) <option value="{{$categories[$i]->id}}">{{$categories[$i]->name}}</option>
                @endfor
        </select>

        <br />

        <fieldset style="display: none;">
            <legend>Zgjidh ndonjë gjë</legend>
            @for($i = 0; $i < sizeof($categories); $i++) <div>
                <input type="checkbox" id="{{$categories[$i]->id}}" name="{{$categories[$i]->id}}" value="{{$categories[$i]->id}}" />
                <label for="{{$categories[$i]->id}}">{{$categories[$i]->name}}</label>
</div>
@endfor
</fieldset>
</form>
</div>
</div>
</div>
</div>
<!-- Back To Top Button -->
<a href="" class="back-to-top btn-primary"><i class="fa fa-chevron-up"></i></a>
</section>
@endsection --}}
