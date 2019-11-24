@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="container text-center">
        <h1 class="hero-heading">Afa</h1>
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <p class="lead text-muted">Ky sistem ju ndihmon te perllogarisni perfitueshmerine e aktivitetit tuaj bujqesor lidhur me planin e investimit dhe sigurimin e burimeve te financimit. Ne menyre elektronike do siguroni nje analize financiare per investimin e planifikuar. Analiza e rasteve te studimit te disa aktiviteteve potenciale te pershkruara kerkon se pari te identifikoje nese nje kornize normative eshte e sakte, strategjikisht e lidhur me teknologjine etj incididunt.</p>
            </div>
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

                @for($i = 0; $i < sizeof($categories); $i++) 
                <div class="button">
                    <div id="category-{{$categories[$i]->id}}-div" class="rtable-cell item-cell-type">
                        <a onclick="selectCategories('{{$categories[$i]}}', '{{$categories}}');" style="cursor: pointer;">
                            <img src="img/product-images/{{$categories[$i]->image}}" style="width:100px; height:100px;" />
                        </a>
                        <input class="form-control in-odd-row item-name" hidden name="item-name-1" type="text" value="Product or Service Name 1" />
                    </div>
                    <div><p>{{$categories[$i]->name}}</p></div>
                </div>
            @endfor

            <br />
            <div class="divider">
                <div class="dividermask"></div>
            </div>

            <form method="POST" action="/result" style="width: 100%;">
                @csrf
                <div class="form-row" id="applicant-name-div" style="display: none; width: 100%;">
                    <label for="applicant-name" >{{trans('messages.applicant_name')}}</label>
                    <input id="applicant-name" class="form-control" type="text" name="applicant-name" required oninvalid="createInvalidMsg(this, '{{trans('validation.applicant_name_required')}}', '');" oninput="createInvalidMsg(this, '', '');"/>
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

                    <input type="hidden" id="selected-categories[]" name="selected-categories[]"/>
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

    <div class="rtable rtable--collapse" style="display: none;">
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
@endsection