<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@600&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />
    <link href="./css/style landing.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/logo_2.png" />
    <title>My IoT Device</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <a class="c-link" href="#">
                    <div class="c-logo">
                        <img src="images/logo_2.png" alt="Logo" class="c-logo__img" />
                        <span class="c-logo__text c-logo__text--white">My IoT Device</span>
                    </div>
                </a>
                <nav class="c-nav">
                    <input id="dropdown" class="c-nav__toggle" type="checkbox" />
                    <div class="c-nav__content">
                        <ul class="c-list c-list--flex">

                            @if (Auth::check())
                                <li class="c-list__item">
                                    <a href="{{ route('dashboard') }}" class="c-link c-link--list">Dashboard</a>
                                </li>
                                <li class="c-list__item">
                                    <a href="{{ route('logout') }}" class="c-link c-link--list">Logout</a>
                                </li>
                            @else
                                <li class="c-list__item">
                                    <a href="{{ route('login') }}" class="c-link c-link--list">Login</a>
                                </li>
                                <li class="c-list__item">
                                    <a href="{{ route('register') }}" class="c-link c-link--list">Register</a>
                                </li>
                            @endif
                        </ul>
                        {{-- <button class="c-button c-button--small c-button--secondary">
                Login
              </button> --}}
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section class="section">
            <div class="c-hero">
                <div class="container">
                    <div class="c-hero__content">
                        <h2 class="heading heading--2 heading--light">
                            Monitor and Control Your IoT Devices Anywhere, Anytime
                        </h2>
                        <h4 class="heading heading--4 heading--blue">
                            Increase Efficiency and Control with Integrated IoT Monitoring and Management at Your
                            Fingertips
                        </h4>
                        <div class="c-hero__button-group">
                            @if (Auth::check())
                                <a href="{{ route('dashboard') }}" class="c-button c-button--primary">Dashboard</a>
                                <a href="{{ route('logout') }}" class="c-button c-button--secondary">Logout</a>
                            @else
                                <a href="{{ route('login') }}" class="c-button c-button--primary">Login</a>
                                <a href="{{ route('register') }}" class="c-button c-button--secondary">Register</a>
                            @endif
                        </div>
                    </div>

                    <div class="c-hero__img-holder">
                        <img class="c-hero__img" src="img/dashboard.png" alt="Dashboard" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section__title-wrapper">
                    <h2 class="heading heading--2">
                        Welcome to My IoT Device
                    </h2>

                    <h4 class="heading heading--4">
                        We provide advanced solutions that allow you to easily monitor and control your IoT devices,
                        wherever you are. With an intuitive interface and advanced features, you can view real-time
                        data, get instant notifications, and manage your devices efficiently.
                    </h4>
                </div>

                {{-- <div class="box box--flex">
            <article class="c-card">
              <div class="c-card__content">
                <h3 class="c-card__title heading heading--3">
                  Seamless collaboration
                </h3>
                <p class="c-paragraph c-card__text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua
                  — Ut enim ad minim veniam,
                  <a href="#" class="c-link">quis nostrud exercitation</a>
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
              </div>
              <div class="c-card__img-holder">
                <img class="c-card__img" src="img/card-1.png" alt="" />
              </div>
            </article>

            <article class="c-card">
              <div class="c-card__content">
                <h3 class="c-card__title heading heading--3">
                  Seamless collaboration
                </h3>
                <p class="c-paragraph c-card__text">
                  Lorem ipsum dolor sit amet,
                  <a href="#" class="c-link">consectetur adipiscing</a> elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua — Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
              </div>

              <div class="c-card__img-holder">
                <img class="c-card__img" src="img/card-2.png" alt="" />
              </div>
            </article>

            <article class="c-card">
              <div class="c-card__content">
                <h3 class="c-card__title heading heading--3">
                  Seamless collaboration
                </h3>
                <p class="c-paragraph c-card__text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod <a href="#" class="c-link">tempor incididunt</a> ut
                  labore et dolore magna aliqua — Ut enim ad minim veniam, quis
                  nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo consequat.
                </p>
              </div>

              <div class="c-card__img-holder">
                <img class="c-card__img" src="img/card-3.png" alt="" />
              </div>
            </article>
          </div> --}}
            </div>
        </section>

        <section class="section features">
            <div class="container">
                <div class="box box--grid">
                    <article class="c-feature">
                        <div class="c-feature__img-holder">
                            <img class="c-feature__img" src="img/feature-1.png" alt="" />
                        </div>
                        <div class="c-feature__content">
                            <h3 class="c-feature__title heading heading--3">
                                Robust workflow
                            </h3>
                            <p class="c-paragraph c-feature__text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                — Ut enim ad minim veniam,
                                <a href="#" class="c-link">quis nostrud exercitation</a>
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </article>

                    <article class="c-feature">
                        <div class="c-feature__img-holder">
                            <img class="c-feature__img" src="img/feature-2.png" alt="" />
                        </div>
                        <div class="c-feature__content">
                            <h3 class="c-feature__title heading heading--3">
                                Robust workflow
                            </h3>
                            <p class="c-paragraph c-feature__text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                — Ut enim ad minim veniam,
                                <a href="#" class="c-link">quis nostrud exercitation</a>
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </article>

                    <article class="c-feature">
                        <div class="c-feature__img-holder">
                            <img class="c-feature__img" src="img/feature-3.png" alt="" />
                        </div>
                        <div class="c-feature__content">
                            <h3 class="c-feature__title heading heading--3">
                                Robust workflow
                            </h3>
                            <p class="c-paragraph c-feature__text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                — Ut enim ad minim veniam,
                                <a href="#" class="c-link">quis nostrud exercitation</a>
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </article>
                </div>

                {{-- <div class="box box--flex box--mt2">
            <button class="c-button c-button--primary">
              Request early access
            </button>
          </div> --}}
            </div>
        </section>

        {{-- <section class="section">
        <div class="container">
          <div class="section__title-wrapper">
            <h2 class="heading heading--2">Simple pricing</h2>

            <h4 class="heading heading--4">
              In the old days, your website was the same for everyone. Not
              anymore. Experiences lets you adapt your website for every
              audience.
            </h4>
          </div>

          <div class="box box--grid box--gap2">
            <article class="c-price">
              <div class="c-price__header">
                <div class="c-price__amount">
                  <h3 class="c-price__amount--title heading heading--3">
                    <span class="c-price__amount--secondary">$</span>
                    <span class="c-price__amount--primary">27</span>
                    <span class="c-price__amount--secondary">/m</span>
                  </h3>
                </div>
                <p class="c-paragraph c-price__text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <h5 class="heading heading--4 c-price__title">
                  What's included
                </h5>
              </div>
              <ul class="c-list">
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--cross"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--cross"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
              </ul>
              <button
                class="c-button c-button--secondary c-button--block c-price__button"
              >
                Request now
              </button>
            </article>

            <article class="c-price c-price--highlight">
              <div class="c-price__header">
                <div class="c-price__amount">
                  <h3 class="c-price__amount--title heading heading--3">
                    <span class="c-price__amount--secondary">$</span>
                    <span class="c-price__amount--primary">27</span>
                    <span class="c-price__amount--secondary">/m</span>
                  </h3>
                </div>
                <p class="c-paragraph c-price__text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <h5 class="heading heading--4 c-price__title">
                  What's included
                </h5>
              </div>
              <ul class="c-list">
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--cross"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
              </ul>
              <button
                class="c-button c-button--primary c-button--block c-price__button"
              >
                Request now
              </button>
            </article>

            <article class="c-price">
              <div class="c-price__header">
                <div class="c-price__amount">
                  <h3 class="c-price__amount--title heading heading--3">
                    <span class="c-price__amount--secondary">$</span>
                    <span class="c-price__amount--primary">47</span>
                    <span class="c-price__amount--secondary">/m</span>
                  </h3>
                </div>
                <p class="c-paragraph c-price__text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
                <h5 class="heading heading--4 c-price__title">
                  What's included
                </h5>
              </div>
              <ul class="c-list">
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
                <li class="c-list__item c-price__list-item">
                  <div class="c-list__icon c-list__icon--check"></div>
                  <div class="c-list__text">Lorem ipsum dolor sit amet.</div>
                </li>
              </ul>
              <button
                class="c-button c-button--secondary c-button--block c-price__button"
              >
                Request now
              </button>
            </article>
          </div>
        </div>
      </section> --}}

        {{-- <section class="section banner">
        <div class="container">
          <div class="c-banner">
            <h2 class="heading heading--2 c-banner__title">
              Request early access today
            </h2>
            <button class="c-button c-button--primary">Request now</button>
          </div>
        </div>
      </section> --}}
    </main>

    <footer class="footer">
        <div class="container">
            <div class="c-footer">
                <div class="c-footer__box">
                    {{-- <a class="c-link" href="#">
              <div class="c-logo">
                <img src="img/logo.png" alt="Logo" class="c-logo__img" />
                <span class="c-logo__text c-logo__text--white">appy</span>
              </div>
            </a>
            <p class="c-paragraph c-footer__text">
              © 2020 Apply, all rights reserved
            </p> --}}
                </div>
                <div class="c-footer__box">
                    <div class="c-footer__icons">
                        <a href="https://www.instagram.com/rioprasetyo_1/">
                            <img class="c-footer__icon" src="img/instagram.svg" alt="Instagram" /></a>
                        <a href="https://wa.me/085850798627">
                            <img class="c-footer__icon" src="img/whatsapp.png" alt="Whatsapp" />
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=100030097365361">
                            <img class="c-footer__icon" src="img/facebook.svg" alt="Facebook" /></a>
                    </div>
                    {{-- <ul class="c-list c-list--flex c-list--align-right">
              <li class="c-list__item c-list__item--small">
                <a href="#" class="c-link c-link--list c-link--list-right"
                  >Contact</a
                >
              </li>
              <li class="c-list__item c-list__item--small">
                <a href="#" class="c-link c-link--list c-link--list-right"
                  >About us</a
                >
              </li>
              <li class="c-list__item c-list__item--small">
                <a href="#" class="c-link c-link--list c-link--list-right"
                  >FAQ</a
                >
              </li>
              <li class="c-list__item c-list__item--small">
                <a href="#" class="c-link c-link--list c-link--list-right"
                  >Support</a
                >
              </li>
            </ul> --}}
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
