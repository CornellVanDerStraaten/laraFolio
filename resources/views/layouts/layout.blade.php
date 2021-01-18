<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Cornell van der Straaten">
    <title>Portfolio Cornell van der Straaten</title>
    <script src="https://kit.fontawesome.com/1eb7c10cba.js" crossorigin="anonymous"></script>
    @section('header-extra')
    @show
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="nav__wrapper">
            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo van Cornell, zijn initialen." class="nav__wrapper-logo"></a>
            <div class="nav__link-wrapper">
                <ul class="nav__link-wrapper-ul">
                    @guest
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component">projecten<span class="slider"></span></a></li>
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component">artikels</a></li>
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component nav-button">Contact</a></li>
                    @else
                    <li class="nav__link-wrapper-link"><a href="{{ route('admin') }}" class="a-tag_component">Admin</a></li>
                    <li class="nav__link-wrapper-link"><a class="a-tag_component nav-button dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </li>


                    @endguest

                </ul>
            </div>
            <div class="nav__burger" id="burgerMenu">
                <div class="line-top burger-line"></div>
                <div class="line-middle burger-line"></div>
                <div class="line-bottom burger-line"></div>
            </div>
        </div>
    </nav>

    <main>
        @section('content')

        @show
    </main>

    {{-- If page content longer than viewport height, add 'footer-relative' in this section --}}
    <footer class="footer @section('footer-position')@show">
        <div class="footer__socials">
            <span class="footer__socials-background"><a href="#"><i class="fab fa-linkedin-in"></i></a></span>
            <span class="footer__socials-background"><a href="#"><i class="fab fa-github"></i></a></span>
        </div>
        <p class="footer__copyright">Copyright © 2020 Cornell van der Straaten</p>
    </footer>

    <script src="{{ asset('/js/mixedJS.js') }}"></script>
    @section('script')

    @show
</body>
</html>
