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
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="c-footer">
                <div class="c-footer__box">

                </div>
                <div class="c-footer__box">
                    <div class="c-footer__icons">
                        <a href="https://www.instagram.com/rioprasetyo_1/">
                            <img class="c-footer__icon" src="img/instagram.svg" alt="Instagram" /></a>
                        <a href="https://wa.me/085850798627">
                            <img class="c-footer__icon" src="img/whatsapp.png" alt="Whatsapp" />
                        </a>
                        {{-- <a href="https://www.facebook.com/profile.php?id=100030097365361">
                            <img class="c-footer__icon" src="img/facebook.svg" alt="Facebook" /></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
