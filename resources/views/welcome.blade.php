@extends('layouts.app')

@section('content')
{{--
    OLD LOGIN

<div class="logos">
  <div class="col-md-3">
    <img id="logo" src="img/logo/aasf.png" style="padding-left: 0px; padding-right: 0px; padding-top: 30px; padding-bottom: 30px;"/>
  </div>
  <div class="col-md-3">
    <img id="logo" src="img/logo/bankaeuropiane.png" />
  </div>
  <div class="col-md-3">
    <img id="logo" src="img/logo/ministriabujqesise.png" />
  </div>
  <div class="col-md-3">
    <img id="logo" src="img/logo/ministriafinancave.png" />
  </div>
</div>
<!-- Popup -->
<div id="myModal" class="modal fade" role="dialog" data-delay="10">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="img/logo/aasf.png" style="width:130px; height:50px; margin-top: 25px; padding-left: 5px; padding-top: 10px;">
        <img src="img/logo/bankaeuropiane.png" style="width:110px; height:100px;">
        <img src="img/logo/ministriabujqesise.png" style="width:100px; height:80px; margin-top:10px;">
        <img src="img/logo/ministriafinancave.png" style="width:100px; height:80px; margin-top:10px; margin-right: 5px;">
      </div>
      <div class="modal-body">
        <p>
          <p style="font-size: 20px;">{{ trans('auth.popup_title') }}</p>
          {!! trans('auth.popup_message') !!}
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
          <div class="col-lg-6 go-left">
            <p class="lead mt-4 mb-4" id="welcometext">
              {{ trans('auth.intro_message') }}
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
                    <br />
                    {{-- <div class="row align-items-center remember">
                      <input type="checkbox">Remember Me
                    </div> --}}
                    {{-- <div class="form-group">
                      <input type="submit" value="{{ trans('auth.login') }}" class="btn float-right login_btn">
                    </div>
                  </form>
                </div> --}}
                <!-- <div class="card-footer">
                  <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                  </div>
                </div> -->
              {{-- </div>
            </div>
          </div> --}
        </div>
      </div>
    </div>
  </div>
</section> --}}

<section class="login-form loginbg">
    <div class="row">
        <div class="col-md-6 logind1 dnon" style="padding: 0px">
            <div class="logind1sb">
                <span>
                    {{trans('messages.pi')}}
                    <br>
                    <a href="#">{{trans('messages.all_rights_reserved')}}</a>
                </span>
            </div>
        </div>
        <div class="col-md-6 logind2">
            <div>
                <h2>{{trans('messages.hello')}}</h2>
				<p>{{trans('messages.authenticate')}}</p>

                <div class="loginformd">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-input mb-40">
                            <div class="form-input-box">
                                <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplet="email" autofocus oninvalid="createInvalidMsg(this, '{{trans('validation.field_required')}}', '{{trans('validation.wrong_format')}}');" oninput="createInvalidMsg(this, '', '{{trans('validation.wrong_format')}}');">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-input mb-40">
                            <div class="form-input-box">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" oninvalid="createInvalidMsg(this, '{{trans('validation.password_required')}}', '');" oninput="createInvalidMsg(this, '', '');">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" value="{{ trans('auth.login') }}" class="btn login_btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
