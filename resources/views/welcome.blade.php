@extends('layouts.app')

@section('content')
<div class="logos">
  <div>
    <img id="logo" src="img/logo/aasf.png" style="padding-top:3vw; padding-bottom:2vw;">
  </div>
  <div>
    <img id="logo" src="img/logo/bankaeuropiane.png" style="padding-left: 7vw; padding-right: 7vw;">
  </div>
  <div>
    <img id="logo" src="img/logo/ministriabujqesise.png">
  </div>
  <div>
    <img id="logo" src="img/logo/ministriafinancave.png">
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
          <!--   @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif -->
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

<div class="copyrights" id="footercontainer">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 text-center text-lg-left">
        <p class="copyrights-text mb-3 mb-lg-0">&copy; Pi Innovative Solutions </p>
      </div>
      <div class="col-lg-6 text-center text-lg-right">

      </div>
    </div>
  </div>
</div>
</footer>


@endsection