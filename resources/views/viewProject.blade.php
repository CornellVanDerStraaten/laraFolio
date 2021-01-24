@extends('layouts.layout')

@section('content')
    <div class="createProject__container">
        <div class="project">
            <div class="project__top">
                <h1 class="project__top-h1">{{ $project->title }}</h1>
                <h2 class="project__top-h2">{{ $project->keywords }}</h2>
                <div class="project__top-links">
                    {{-- If no github link, dont show button --}}
                    @if( !$project->github_link == null)
                        <a class="project__top-link" href="{{ $project->github_link }}" target="_blank"><button>Github Link</button></a>
                    @endif
                    {{-- If no live link, dont show button --}}
                    @if( !$project->live_link == null)
                        <a class="project__top-link" href="{{ $project->live_link }}" target="_blank"><button>Live Link</button></a>
                    @endif
                </div>
            </div>

            <div class="cp__thumb-holder project__thumbnail" style="background-image: url('{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->thumbnail_image) }}');"></div>
            <div class="cp__extra-info project__extra-info">
                <span class="project__extra-info-item">
                    <p class="project__extra-item-title">Developers</p>
                    <p class="project__extra-developers project__extra-item">{{ $project->developers }}</p>
                </span>
                <span class="project__extra-info-item">
                    <p class="project__extra-item-title">Vormgevers</p>
                    <p class="project__extra-developers project__extra-item">{{ $project->vormgevers }}</p>
                </span>
                <span class="project__extra-info-item">
                    <p class="project__extra-item-title">Taal</p>
                    <p class="project__extra-developers project__extra-item">{{ $project->taal }}</p>
                </span>
            </div>

            <div class="project__contentarea">
                {!! $project->content !!}
            </div>

            <div class="cp__extra-images">
                <div class="cp__extra-image" style="background-image:  url('{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->images[0]->link) }}');" id="extra_project_image_left"></div>
                <div class="cp__extra-image" style="background-image:  url('{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->images[1]->link) }}');" id="extra_project_image_left"></div>
                <div class="cp__extra-image" style="background-image:  url('{{  str_contains($project->thumbnail_image, 'via.') ? $project->thumbnail_image : asset('storage/' . $project->images[2]->link) }}');" id="extra_project_image_left"></div>
            </div>
        </div>
    </div>
@endsection

@section('footer-position')
    footer-relative
@endsection

