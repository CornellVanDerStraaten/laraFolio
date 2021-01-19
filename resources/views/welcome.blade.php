@extends('layouts.layout')

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
            </div>
            <img src="{{ asset('img/cornell-image.png') }}" class="home__overMij-img">
        </div>
    </div>

    <h1>Projecten</h1>
    <table>
    @foreach($projects as $project)
    <tr class="voorbeeld-table">
        <td class="row"><h2>{{ $project->title }}</h2></td>
        <td><h2>Gepubliceerd op: {{ $project->published_date }}</h2></td>
        <td><a href="/project/{{ $project->slug }}" class="voorbeeld-link a-tag_component nav-button">Lees meer</a></td>
    </tr>
    @endforeach
    </table>
@endsection

@section('footer-position')
    footer-relative
@endsection
