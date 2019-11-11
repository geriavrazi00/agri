@extends('layouts.app')

@section('content')
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-heading mb-0">AGRI FINANCIAL <br>ANALYSIS </h1><h2 color: orange>APP</h2>
                    <div class="row">
                        <div class="col-lg-10">
                            <p class="lead mt-4 mb-4">
                                Ky sistem ju ndihmon te perllogarisni perfitueshmerine e aktiviteti bujqesor lidhur me planin e investimit dhe sigurimin e burimeve te financimit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"><img src="img/illustration-hero-blue.svg" alt="..."
                class="hero-image img-fluid d-none d-lg-block"></div>
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
          <div class="col-lg-8 mx-auto">
            <p class="lead text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
              eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="services mt-5">
        <div class="row">
          <div class="col-lg-4">
            <a href="faq.html" class="service-link animated-element">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><i class="icon icon-calculator-1 color-1"></i></div>
                <h3 class="service-title">Llogaritja e Kostove</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                    eiusmod tempor incididunt ut labore.</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="faq.html" class="service-link animated-element">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><i class="icon icon-shopping-cart-1 color-2"></i></div>
                <h3 class="service-title">Llogaritja e Kostove</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                    eiusmod tempor incididunt ut labore.</p>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="faq.html" class="service-link animated-element">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><i class="icon icon-email color-3"></i></div>
                <h3 class="service-title">Llogaritja e Kostove</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                    eiusmod tempor incididunt ut labore.</p>
              </div>
            </a>
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
        <div class="col-lg-5 mt-5 mt-lg-0"><img src="img/illustration-about-blue.svg" alt=""
            class="divider-image img-fluid">
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
        </div><a href="/login" class="btn btn-primary mt-4 animated-element">Get Started <i class="icon icon-arrow-right"></i></a>
      </div>
    </div>
    <div>
      <img class="center" src="img/aasf.jpg" alt="">
    </div>
  </section>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-5 mb-lg-0">
          <div class="footer-logo"><img src="img/logo/agrilogo.jpeg" alt="..." class="img-fluid"></div>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0">
          <h5 class="footer-heading">Menu Links</h5>
          <ul class="list-unstyled">
            <li> <a href="index.html" class="footer-link">Home</a></li>
            <li> <a href="faq.html" class="footer-link">FAQ</a></li>
            <li> <a href="#" class="footer-link">Buy</a></li>
          </ul>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0">
          <h5 class="footer-heading">Order Wizard</h5>
          <ul class="list-unstyled">
            <li> <a href="order-1.html" class="footer-link">Calculator Demo 1</a></li>
            <li> <a href="order-2.html" class="footer-link">Calculator Demo 2</a></li>
            <li> <a href="order-3.html" class="footer-link">Calculator Demo 3</a></li>
          </ul>
        </div>
        <div class="col-lg-3">
          <h5 class="footer-heading">Useful Links</h5>
          <ul class="list-unstyled">
            <li> <a href="#" class="footer-link">Privacy Policy</a></li>
            <li> <a href="#" class="footer-link">Terms and Conditions</a></li>
            <li> <a href="#" class="footer-link">Legal Info</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="copyrights">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-left">
            <p class="copyrights-text mb-3 mb-lg-0">&copy; 2019. With <i class="fa fa-heart"></i> by <a
                href="https://themeforest.net/user/ultimatewebsolutions" class="external footer-link"
                target="_blank">UltimateWebsolutions </a></p>
          </div>
          <div class="col-lg-6 text-center text-lg-right">
            <ul class="list-inline social mb-0">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook"></i></a><a href="#"
                  class="social-link"><i class="fa fa-twitter"></i></a><a href="#" class="social-link"><i
                    class="fa fa-youtube-play"></i></a><a href="#" class="social-link"><i class="fa fa-vimeo"></i></a><a
                  href="#" class="social-link"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back To Top Button -->
  <a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

@endsection