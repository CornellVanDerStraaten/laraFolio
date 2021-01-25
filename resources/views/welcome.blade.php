@extends('layouts.layout')

@section('header-extra')
    {{-- OwlCarousel   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />

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

        <div class="home__projects-section owl-carousel owl-theme">
            @foreach($projects as $project)
                <div class="home__project">
                    <div class="home__project-imgContainer">
                        <img src="{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->thumbnail_image) }}" class="home__project-imgContainer-img">
                    </div>
                    <div class="home__project-info">
                        <h3 class="home__project-info-title" >{{ $project->title }}</h3>
                        <p class="home__project-info-keywords">{{ $project->keywords }}</p>
                        <div class="home__project-info-button-positioner">
                            <a class="home__project-info-button nav-button" href="{{ route('projecten.show', ['slug' => $project->slug])  }}">Lees meer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
{{--  Init Carousel  --}}
<script>
    const carouselArrow = `<img src="{{ asset('img/carousel-arrow.svg') }}" class="carousel-arrow-prev">`;
    const carouselArrowRight = `<img src="{{ asset('img/carousel-arrow.svg') }}" class="carousel-arrow-next">`;

    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            center: true,
            items:1,
            loop:true,
            nav:true,
            navText:[carouselArrow, carouselArrowRight],
            lazyload:true,
            responsive:{
                900:{
                    items:3
                }
            }
        });
    });
</script>


@endsection

@section('footer-position')
    footer-relative
@endsection
