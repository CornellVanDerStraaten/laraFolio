@extends('layouts.layout')

@section('header-extra')
    {{-- Lightweight Vanilla JS Carousel   --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide-core.min.css">
@endsection

@section('content')
    <header class="home__header">
        <div class="home__header-positioner">
            <h1 class="home__header-title">Fullstack Developer.</h1>
            <span class="home__header-div">
                <hr class="home__header-hr">
                <h2 class="home__header-subtitle">Cornell van der Straaten</h2>
            </span>
            <a class="home__header-cta a-tag_component" href="#">Mijn Werk</a>{{-- TODO Make route --}}
        </div>
        <img src="{{ asset('img/header-img.png') }}" class="home__header-img">
    </header>

    <div class="home__overMij">
        <div class="component__tussentitel">
            <h2 class="component__tussentitel-titel">Over mij.</h2>
            <span class="component__tussentitel-ondertitel-houder">
                <hr class="component__tussentitel-hr hr">
                <h3 class="component__tussentitel-ondertitel">
                    Laten we kennis maken
                </h3>
                <hr class="component__tussentitel-hr hr">
            </span>
        </div>

        <div class="home__overMij-section">
            <div class="home__overMij-positioner">
                <h2 class="home__overMij-titel">Hey, ik ben Cornell</h2>
                <p class="home__overMij-text">
                    Ik ben een front- en backend developer.
                    Ik ben geinteresseerd en gepassioneerd over alles development gerelateerd.
                    Momenteel volg ik een MBO studie op het Mediacollege Amsterdam.
                    Ook ben ik samen met Mees Postma een klein bedrijf
                    gestart waar wij wordpress websites en hosting opzetten
                    en ook SEO verzorgen.
                </p>
                <p class="home__overMij-text">
                    Ik ben een front- en backend developer.
                    Ik ben geinteresseerd en gepassioneerd over alles development gerelateerd.
                    Momenteel volg ik een MBO studie op het Mediacollege Amsterdam.
                    Ook ben ik samen met Mees Postma een klein bedrijf
                    gestart waar wij wordpress websites en hosting opzetten
                    en ook SEO verzorgen.
                </p>
                <img src="{{ asset('img/cornell-image.png') }}" class="home__overMij-img">
            </div>

        </div>
    </div>

    <div class="home__projects">
        <div class="component__tussentitel">
            <h2 class="component__tussentitel-titel">Mijn werk.</h2>
            <span class="component__tussentitel-ondertitel-houder">
                <hr class="component__tussentitel-hr hr">
                <h3 class="component__tussentitel-ondertitel">
                    Ontdek wat ik kan
                </h3>
                <hr class="component__tussentitel-hr hr">
            </span>
        </div>

        <div class="home__projects-section splide">
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev">
                    Prev
                </button>
                <button class="splide__arrow splide__arrow--next">
                    Next
                </button>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($projects as $project)
                        <li class="splide__slide">
                            <div class="home__project">
                                <div class="home__project-imgContainer">
                                    <img src="{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->thumbnail_image) }}" class="home__project-imgContainer-img">
                                </div>
                                <div class="home__project-info">
                                    <h3 class="home__project-info-title" >{{ $project->title }}</h3>
                                    <p class="home__project-info-keywords">{{ $project->keywords }}</p>
                                    <a class="home__project-info-button nav-button" href="{{ route('projecten.show', ['slug' => $project->slug])  }}">Lees meer</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('script')
{{--  Init Carousel  --}}
<script>
    new Splide( '.splide', {
        perPage: 3,
        rewind : true,
    } ).mount();
</script>


@endsection

@section('footer-position')
    footer-relative
@endsection
