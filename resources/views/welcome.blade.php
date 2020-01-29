@extends('layouts.app')

@section('content')

<!-- Preloader -->
<div class="preloader"></div>
<div class="logos">
  <div id="logo">
    <img src="img/logo/aasf.png" width="200" height="100" style="padding-top:35px;">
  </div>
  <div id="logo">
    <img src="img/logo/bankaeuropiane.png" width="150" height="150">
  </div>
  <div id="logo">
    <img src="img/logo/ministriabujqesise.png" width="150" height="150">
  </div>
  <div id="logo">
    <img src="img/logo/ministriafinancave.png" width="150" height="150">
  </div>
</div>
<!-- Popup -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>
          <p style="font-size: 20px;"> Programi i Mbështetjes së Agrobiznesit Shqiptar (AASF) </p>
          AASF është një projekt i financuar
          dhe zhvilluar nga Banka Evropiane për Rindërtim dhe Zhvillim (BERZH) në bashkëpunim dhe
          me mbështjetje nga Qeveria Shqiptare, i cili ka nisur aktivitetin e tij në 2016.
          </br>
          Qëllimi i këtij Programi është të motivojë institucionet financiare shqiptare për të
          mbështetur një sektor vital të ekonomisë shqiptare me potenciale gjerësisht të pashfrytëzuara
          – bujqësia dhe agrobizneset.
          </br>
          Programi mundëson financim dhe rritje të kapaciteteve teknike
          të Institucioneve Financiare.
          </br>
          AASF ofron zgjidhje inovatore për financimin e bujqësisë dhe agrobiznesit shqiptar.
        </p>
      </div>
      <button type="button" class="btn btn-primary" data-dismiss="modal">Mbyll</button>
    </div>

  </div>
</div>
<!-- Hero Section -->
<section class="superhero">
  <div class="container mb-5">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <div class="row" id="herorow">
          <div class="col-lg-6">
            <p class="lead mt-4 mb-4" id="welcometext">
              Aplikacioni Agro-financa ju ndihmon të përllogarisni përfitueshmërinë e planeve të investimit nga aktiviteti bujqësor.
            </p>
          </div>
          <!--NEWLOGIN-->
          <div class="col-lg-6">
            <div class="d-flex justify-content-center h-100">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplet="email" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" oninvalid="createInvalidMsg(this, '{{trans('validation.password_required')}}', '');" oninput="createInvalidMsg(this, '', '');">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="row align-items-center remember">
                      <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer">
                  <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                  </div> 
                </div> -->
              </div>
            </div>
          </div>
          <!-- LOGIN
          <div class="col-lg-6">
            <form method="POST" action="{{ route('login') }}" style="width: 100%;">
              @csrf

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Adresa e-mail</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Fjalëkalimi</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" oninvalid="createInvalidMsg(this, '{{trans('validation.password_required')}}', '');" oninput="createInvalidMsg(this, '', '');">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
-->

          <!-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> 

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-6">
              <button type="submit" class="btn btn-primary">
                Kyçu
              </button>
-->
          <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif -->
        </div>
      </div>
      </form>
    </div>

  </div>
  </div>
  </div>
  </div>
</section>
<!-- Services Section -->
<section>
  <div class="container">
    <div class="text-center">
      <div class="border-multiple">
        <span class="first"></span>
        <span class="second"></span>
        <span class="third"></span>
      </div>
      <div class="row">
      </div>
    </div>
  </div>
</section>


<!-- Footer -->

<div class="copyrights">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left">
        <p class="copyrights-text mb-3 mb-lg-0">&copy; 2019. </p>
      </div>
      <div class="col-lg-6 text-center text-lg-right">

      </div>
    </div>
  </div>
</div>
</footer>



@endsection