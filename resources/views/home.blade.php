@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="container text-center">
        <div class="row">
            <form method="POST" action="/result" style="width: 100%;">
                @csrf
                <div class="form-row" id="applicant-name-div" style=" width: 100%;">
                    <label for="applicant-name" id="applicantname" style="font-weight: 700;">{{trans('messages.applicant_name')}}</label>
                    <input class="form-control" id="applicantnameinput" type="text" name="applicant-name" required oninvalid="createInvalidMsg(this, '{{trans('validation.applicant_name_required')}}', '');" oninput="createInvalidMsg(this, '', '');" />
                    <p id="applicant-label-desc">*Vendosni emrin e aplikantit ose subjektit</p>
                </div>
                </br>
            </form>
        </div>
    </div>
</section>

<!-- Order Wizard Start -->
<section id="orderWizard">
    <!-- Container Start -->
    <div class="container">
        <!-- Calculator Table Start -->
        <div id="calcTable">
            <!-- Responsive Table Start -->
            <div class="rtable rtable--collapse">

                <!-- Table Heading Start -->
                <div class="rtable-row rtable-row--head">
                    <div class="rtable-cell item-cell column-heading" style="text-align:center">Zgjidhni kategorine e investimit</div>
                </div>
                <!-- Table Heading End -->
                <!--Short table information-->
                <div id="tabledesc">
                    <p>
                        Aktivitetet bujqesore kane intensitete zhvillimi te ndryshme bazuar ne pozicionin gjeografik te fermes, sherbimeve
                        agroteknike qe perdor, menyren e kultivimit (intensive apo tradicionale), faktoreve klimaterik etj.
                        Kjo platforme te mundeson te perzgjedhesh nivelin operues te fermes
                    </p>

                </div>

                <div class="container" style="display: contents;">
                    @for($i = 0; $i < sizeof($categories); $i++) <div class="button">
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
                @endfor
            </div>

            <br />
            <div class="divider">
                <div class="dividermask"></div>
            </div>

            <form method="GET" action="/result" style="width: 100%;">
                <input type="hidden" id="date" name="date" value="{{date('d-m-Y H:i:s')}}" />

                <div class="form-row" id="applicant-name-div" style="width: 100%;">
                    <label for="applicant-name" id="applicantname" style="font-weight: 700;">{{trans('messages.applicant_name')}}</label>
                    <input class="form-control" id="applicantnameinput" type="text" name="applicant-name" required oninvalid="createInvalidMsg(this, '{{trans('validation.applicant_name_required')}}', '');" oninput="createInvalidMsg(this, '', '');" />
                </div>

                <br />

                @foreach($categoriesData as $key => $category)
                @if($category['investments'] != null)
                <div id="category-{{$key}}" style="display: none; width: 100%; padding-top: 20px;">
                    @include('inputs')
                </div>
                @endif
                @endforeach

                <div id="loan" style="display: none; width: 100%;">
                    @include('loan')

                    <input type="hidden" id="selected-categories[]" name="selected-categories[]" />
                    <br />

                    <center>
                        <button class="btn btn-primary" type="submit">
                            {{trans('messages.generate')}}
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
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
</section>
@endsection --}}
