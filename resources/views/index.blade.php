@extends('layouts.main')
  @section('content')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-6 intro-info order-md-first order-last">
          <h2>{{ $data['site']->site_header_text }} <span> ;)</span></h2>
          <div>
            <a href="{{ route('user.convert') }}" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first">
          <img src="{{ asset('img/'.$data['site']->site_header_pic) }}" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">

      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="{{ asset('img/' . $data['content'][0]->img ) }}" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <h2>About Us</h2>
              <h3> {{ $data['content'][0]->h1 }} </h3>
              <p>  {{ $data['content'][0]->p }}  </p>
              <ul>
                <!-- <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
          <p>{{ $data['content'][1]->h1 }}</p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="{{ $data['content'][2]->img }}" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][2]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][2]->p }} </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="{{ $data['content'][3]->img }}" style="color: #e98e06;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][3]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][3]->p }} </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="{{ $data['content'][4]->img }}" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][4]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][4]->p }} </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #eafde7;"><i class="{{ $data['content'][5]->img }}" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][5]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][5]->p }} </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #e1eeff;"><i class="{{ $data['content'][6]->img }}" style="color: #2282ff;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][6]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][6]->p }} </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon" style="background: #ecebff;"><i class="{{ $data['content'][7]->img }}" style="color: #8660fe;"></i></div>
              <h4 class="title"><a href="">{{ $data['content'][7]->h1 }}</a></h4>
              <p class="description"> {{ $data['content'][7]->p }} </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container-fluid">
        
        <header class="section-header">
          <h3>Why choose us?</h3>
          <p> {{ $data['content'][8]->h1 }} </p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <div class="why-us-img">
              <img src="{{ asset('img/' . $data['content'][8]->img ) }}" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="why-us-content">
              <p> {{ $data['content'][8]->p }} </p>

              <!-- <div class="features wow bounceInUp clearfix">
                <i class="fa fa-diamond" style="color: #f058dc;"></i>
                <h4>Corporis dolorem</h4>
                <p>Commodi quia voluptatum. Est cupiditate voluptas quaerat officiis ex alias dignissimos et ipsum. Soluta at enim modi ut incidunt dolor et.</p>
              </div>

              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-object-group" style="color: #ffb774;"></i>
                <h4>Eum ut aspernatur</h4>
                <p>Molestias eius rerum iusto voluptas et ab cupiditate aut enim. Assumenda animi occaecati. Quo dolore fuga quasi autem aliquid ipsum odit. Perferendis doloremque iure nulla aut.</p>
              </div>
              
              <div class="features wow bounceInUp clearfix">
                <i class="fa fa-language" style="color: #589af1;"></i>
                <h4>Voluptates dolores</h4>
                <p>Voluptates nihil et quis omnis et eaque omnis sint aut. Ducimus dolorum aspernatur. Totam dolores ut enim ullam voluptas distinctio aut.</p>
              </div> -->
              
            </div>

          </div>

        </div>

      </div>

      <div class="container">
        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{ $data['content'][9]->h1 }}</span>
            <p>{{ $data['content'][9]->p }}</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{ $data['content'][10]->h1 }}</span>
            <p>{{ $data['content'][10]->p }}</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{ $data['content'][11]->h1 }}</span>
            <p>{{ $data['content'][11]->p }}</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">{{ $data['content'][12]->h1 }}</span>
            <p>{{ $data['content'][12]->p }}</p>
          </div>
  
        </div>

      </div>
    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">{{ $data['content'][13]->h1 }}</h3>
            <p class="cta-text"> {{ $data['content'][13]->p }} </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">{{ $data['content'][13]->h2 }}</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Features Section
    ============================-->
    <section id="features">
      <div class="container">

        <div class="row feature-item">
          <div class="col-lg-6 wow fadeInUp">
            <img src="{{ asset('img/' . $data['content'][14]->img ) }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4>{{ $data['content'][14]->h1 }}</h4>
            <p>{{ $data['content'][14]->p }}</p>
          </div>
        </div>

        <div class="row feature-item mt-5 pt-5">
          <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
            <img src="{{ asset('img/' . $data['content'][15]->img ) }}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h4>{{ $data['content'][15]->h1 }}</h4>
            <p>{{ $data['content'][15]->p }}</p>
          </div>
          
        </div>

      </div>
    </section><!-- #about -->


    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
    
            <div class="testimonial-item">
                <img src="{{ asset('img/' . $data['content'][16]->img ) }}" class="testimonial-img" alt="">
                <h3> {{ $data['content'][16]->h1 }} </h3>
                <h4> {{ $data['content'][16]->h2 }} </h4>
                <p> {{ $data['content'][16]->p }} </p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/' . $data['content'][16]->img ) }}" class="testimonial-img" alt="">
                <h3> {{ $data['content'][17]->h1 }} </h3>
                <h4> {{ $data['content'][17]->h2 }} </h4>
                <p> {{ $data['content'][17]->p }} </p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/' . $data['content'][16]->img ) }}" class="testimonial-img" alt="">
                <h3> {{ $data['content'][18]->h1 }} </h3>
                <h4> {{ $data['content'][18]->h2 }} </h4>
                <p> {{ $data['content'][18]->p }} </p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/' . $data['content'][16]->img ) }}" class="testimonial-img" alt="">
                <h3> {{ $data['content'][19]->h1 }} </h3>
                <h4> {{ $data['content'][19]->h2 }} </h4>
                <p> {{ $data['content'][19]->p }} </p>
            </div>

            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3>Team</h3>
          <p> {{ $data['content'][20]->h1 }} </p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{ asset('img/' . $data['content'][21]->img ) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $data['content'][21]->h1 }}</h4>
                  <span>{{ $data['content'][21]->h2 }}</span>
                  <div class="social">
                    <a href="{{ $data['content'][21]->url }}"><i class="fa fa-globe"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="{{ asset('img/' . $data['content'][22]->img ) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $data['content'][22]->h1 }}</h4>
                  <span>{{ $data['content'][22]->h2 }}</span>
                  <div class="social">
                    <a href="{{ $data['content'][22]->url }}"><i class="fa fa-globe"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="{{ asset('img/' . $data['content'][23]->img ) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $data['content'][23]->h1 }}</h4>
                  <span>{{ $data['content'][23]->h2 }}</span>
                  <div class="social">
                    <a href="{{ $data['content'][23]->url }}"><i class="fa fa-globe"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="{{ asset('img/' . $data['content'][24]->img ) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $data['content'][24]->h1 }}</h4>
                  <span>{{ $data['content'][24]->h2 }}</span>
                  <div class="social">
                    <a href="{{ $data['content'][24]->url }}"><i class="fa fa-globe"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="{{ asset('img/' .$data['content'][25]->img) }}" alt="">
          <img src="{{ asset('img/' .$data['content'][26]->img) }}" alt="">
          <img src="{{ asset('img/' .$data['content'][27]->img) }}" alt="">
          <img src="{{ asset('img/' .$data['content'][28]->img) }}" alt="">
          <img src="{{ asset('img/' .$data['content'][29]->img) }}" alt="">
          <img src="{{ asset('img/' .$data['content'][30]->img) }}" alt="">
        </div>

      </div>
    </section><!-- #clients -->


    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
      <div class="container">
        <header class="section-header">
          <h3>Frequently Asked Questions</h3>
          <p>{{ $data['content'][31]->h1 }}</p>
        </header>

        <ul id="faq-list" class="wow fadeInUp">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">{{ $data['content'][32]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][32]->p }} </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">{{ $data['content'][33]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][33]->p }} </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed"> {{ $data['content'][34]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][34]->p }} </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed"> {{ $data['content'][35]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][35]->p }} </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed"> {{ $data['content'][36]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][36]->p }} </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed"> {{ $data['content'][37]->h1 }} <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
              <p> {{ $data['content'][37]->p }} </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- #faq -->
  </main>

  @endsection