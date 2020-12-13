<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Cornell van der Straaten">
    <title>Portfolio Cornell van der Straaten</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="nav__wrapper">
            <img src="{{ asset('img/logo.png') }}" alt="Logo van Cornell, zijn initialen." class="nav__wrapper-logo">
            <div class="nav__link-wrapper">
                <ul class="nav__link-wrapper-ul">
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component">projecten<span class="slider"></span></a></li>
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component">artikels</a></li>
                    <li class="nav__link-wrapper-link"><a href="#" class="a-tag_component nav-button">Contact</a></li>
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

    <footer>
        Dit is de footer in de layout
    </footer>
    <script src="{{ asset('/js/mixedJS.js') }}"></script>
</body>
</html>
