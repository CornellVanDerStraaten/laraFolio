@extends('layouts.layout')

@section('header-extra')
    {{-- OwlCarousel   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/1eb7c10cba.js" crossorigin="anonymous"></script>
@endsection

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
{{--            <p class="projectDashboard__topLine-delete">Delete Project</p>--}}
        </div>
    </div>
    {{-- Hier komen nog project statistieken, bijvoorbeeld hoeveel bezoekers etc --}}
    <div class="projectDashboard__allProjects owl-carousel owl-theme">

        @foreach($projects as $project)
            <div class="home__project">
                <div class="home__project-imgContainer">
                    <img src="{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->thumbnail_image) }}" class="home__project-imgContainer-img">
                </div>
                <div class="home__project-info">
                    <h3 class="home__project-info-title" >{{ $project->title }}</h3>
                    <p class="home__project-info-keywords">{{ $project->keywords }}</p>
                    <div class="home__project-info-button-positioner">
                        <a class="home__project-info-button nav-button" href="{{ route('projecten.edit', ['slug' => $project->slug])  }}">Edit Project</a>
                    </div>
                </div>
                <div class="delete_icon_div" onclick="document.getElementById('form{{$project->id}}').submit()">
                        <i class="fas fa-trash-alt delete_icon"></i>
                    <form id="form{{$project->id}}" action="{{ route('projecten.destroy', ['slug' => $project->slug]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @endforeach
    </div>
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

