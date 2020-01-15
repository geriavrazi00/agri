@extends('layouts.app')

@section('content')
<!-- Preloader -->
<div class="preloader"></div>

<!-- Hero Section -->
<section class="hero">
  <div class="container mb-5">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-10">
            <p class="lead mt-4 mb-4">
              Aplikacioni Agro-financa ju ndihmon të përllogarisni përfitueshmërinë e planeve të investimit nga aktiviteti bujqësor.
            </p>
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
      <h2>Sherbimi</h2>
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
<section class>
  <div class="container text-center text-lg-left">
    <div class="row align-items-center">
      <div class="col-lg-5 mt-5 mt-lg-0"><img src="img/logo/logoferme.png" alt="" class="divider-image img-fluid">
      </div>
      <div class="col-lg-7">
        <div class="row">
          <div class="col-lg-10">
            <p class="lead divider-subtitle mt-2 text-muted">Programi i Mbeshtetjes se Agrobiznesit Shqiptar (AASF) eshte nje projekt
              i financuar dhe zhvilluar nga Banka Europiane per Rindertim dhe Zhvillim (BERZH) ne bashkepunim dhe me
              mbeshtetjen nga Qeveria Shqiptare i cili ka nisur aktivitetin e tij ne 2016. Qellimi i ketij Programi eshte
              te motivoje institucionet financiare shiptare per te mbeshtetur nje sektor vital te ekonomise shqiptare me potenciale gjeresisht
              te pashfrytezuara - bujqesia dhe agrobiznesi.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- About Section -->
<section class="bg-gray">
  <div class="container text-center text-lg-left">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h2>Rreth Nesh</h2>
        <div class="row">
          <div class="col-lg-10">
            <p class="lead divider-subtitle mt-2 text-muted">Programi i Mbeshtetjes se Agrobiznesit Shqiptar (AASF) eshte nje projekt
              i financuar dhe zhvilluar nga Banka Europiane per Rindertim dhe Zhvillim (BERZH) ne bashkepunim dhe me
              mbeshtetjen nga Qeveria Shqiptare i cili ka nisur aktivitetin e tij ne 2016. Qellimi i ketij Programi eshte
              te motivoje institucionet financiare shiptare per te mbeshtetur nje sektor vital te ekonomise shqiptare me potenciale gjeresisht
              te pashfrytezuara - bujqesia dhe agrobiznesi.</p>
          </div>
        </div><a> <i></i></a>
      </div>
      <div class="col-lg-5 mt-5 mt-lg-0"><img src="img/logo/logotractor.png" alt="" class="divider-image img-fluid">
      </div>
    </div>
  </div>
</section>
<!-- How It Works Section -->
<section>
  <div class="container">
    <div class="text-center">
      <h2>Provo Afi</h2>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <p class="lead text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
            Eiusmod tempor incididunt ut labore.</p>
        </div>
      </div><a href="/login" class="btn btn-primary mt-4 animated-element">Kyçu <i class="icon icon-arrow-right"></i></a>
    </div>
  </div>
  <div>
  </div>
</section>

<!-- Footer -->
<footer class="main-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="footer-logo"><img src="img/logo/logoafa.png" alt="..." class="img-fluid"></div>
      </div>
      <div class="col-lg-3">
        <img src="img/logo/bankaeuropiane.png" style="width:200px; height:200px;">
      </div>
      <div class="col-lg-3">
        <img src="img/logo/ministriabujqesise.png" style="width:250px; height:200px;">
      </div>
      <div class="col-lg-3">
        <img src="img/logo/ministriafinancave.png" style="width:250px; height:200px;">
      </div>
    </div>
  </div>
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

<!-- Back To Top Button -->
<a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection