@extends('layouts.layout')

@section('content')
    <?php use App\Models\Project; ?>
<div class="projectDashboard__div">
    <div class="projectDashboard__topLine">
        <div class="dashboard__hello-div">
            <h2 class="dashboardHello">Hallo, {{ Auth::user()->firstname }}</h2>
            <p class="dashboardHello-subtext">Maak, bewerk of verwijder hier zo nodig een artikel! Werkse!</p>
        </div>
        <div class="dashboard-buttons">
            <a class="projectDashboard__topLine-button" href="{{ route('projects.create') }}"><p class="nav-button no-margin">Maak Project</p></a>
            <p class="projectDashboard__topLine-delete">Delete Project</p>
        </div>
    </div>
    {{-- Hier komen nog project statistieken, bijvoorbeeld hoeveel bezoekers etc --}}
    <div class="projectDashboard__allProjects">

        @foreach($projects as $project)
        <div class="projectCard">
            <div class="projectCard__image-holder">
                <img src="#" alt="Een foto van het project: {{ $project->title }}">

            </div>
            <div class="projectCard_card-info">

            </div>

        </div>
        @endforeach
    </div>
</div>


@endsection
