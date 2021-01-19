@extends('layouts.layout')

@section('content')
    <header class="home__header">
        <div class="home__header-positioner">
            <h1 class="home__header-title">Fullstack Developer.</h1>
            <span class="home__header-div">
                <hr class="home__header-hr">
                <h2 class="home__header-subtitle">Cornell van der Straaten</h2>
            </span>
            <a class="home__header-cta a-tag_component">Mijn Werk</a>{{-- TODO Make route --}}
        </div>
        <img src="{{ asset('img/header-img.png') }}" class="home__header-img">
    </header>


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
