@extends('layouts.layout')

@section('header-extra')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="createProject__container">
    <form class="cp__form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="cp__top">
            {{-- Title Input --}}
            <input class="cp__input cp__title-input" type="text" name="title" placeholder="Titel" value="{{ old('title') }}" required autocomplete="off">
            @error('title')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Keyword Input --}}
            <input class="cp__input cp__keyword-input" type="text" name="keywords" placeholder="Keywords"  value="{{ old('keywords') }}" required autocomplete="off">
            @error('keywords')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Div to hold link inputs --}}
            <div class="cp__link-inputs">
                {{-- Live Link Input --}}
                <div class="cp__link-input-holder">
                    <input class="cp__input cp__link-input" type="text" name="live_link" value="{{ old('live_link') }}" placeholder="Live website link" autocomplete="off">
                    @error('live_link')
                        <p style="color: white">{{ $message }}</p>
                    @enderror
                </div>

                <div class="cp__link-input-holder">
                    {{-- Github Link Input --}}
                    <input class="cp__input cp__link-input" type="text" name="github_link" value="{{ old('github_link') }}" placeholder="Github link" autocomplete="off">
                    @error('github_link')
                        <p style="color: white">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        <div class="cp__thumb-holder" id="thumb_background" style="background-image: url('https://via.placeholder.com/150');">
            {{-- Thumbnail Image Input --}}
            <input type="file" class="cp__thumb-input" name="thumbnail_image" onchange="loadFile(event, 'thumb')">
            @error('thumbnail_image')
                <p style="color: white">{{ $message }}</p>
            @enderror
        </div>

        <div class="cp__extra-info">
            {{-- Developers Input --}}
            <input class="cp__input cp__developers-input" type="text" name="developers" placeholder="Developers" value="{{ old('developers') }}" required autocomplete="off">
            @error('slug')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Vormgevers Input --}}
            <input class="cp__input cp__vormgevers-input" type="text" name="vormgevers" placeholder="Vormgevers" value="{{ old('vormgevers') }}" required autocomplete="off">
            @error('vormgevers')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Taal Input --}}
            <input class="cp__input cp__taal-input" type="text" name="taal" placeholder="Taal" value="{{ old('taal') }}" required autocomplete="off">
            @error('taal')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Slug Input --}}
            <input class="cp__input cp__slug-input" type="text" name="slug" placeholder="Slug" value="{{ old('slug') }}" required autocomplete="off">
            @error('slug')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Active Input --}}
            <select name="active">
                <option value="1">Publiceer</option>
                <option value="0">Verberg</option>
            </select>
            @error('active')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Published date input --}}
            <input type="date" name="published_date" value="{{ old('published_date') }}" autocomplete="off">
            @error('published_date')
                <p style="color: white">{{ $message }}</p>
            @enderror
        </div>

        <div class="cp__content">
            {{-- Textarea --}}
            <textarea class="cp__content-textarea" name="content" id="editorProjects" cols="30" rows="10" value="{{ old('content') }}" autocomplete="off"></textarea>
            @error('content')
                <p style="color: white">{{ $message }}</p>
            @enderror
        </div>

        <div class="cp__extra-images">
            <div class="cp__extra-image" style="background-image: url('https://via.placeholder.com/150');" id="extra_project_image_left">
                {{-- Extra Image Input --}}
                <input type="file" class="cp__extra-input" name="project_image[1]"  onchange="loadFile(event, 'extra_left')">
                @error('project_image[]')
                    <p style="color: white">{{ $message }}</p>
                @enderror
            </div>

            <div class="cp__extra-image" style="background-image: url('https://via.placeholder.com/150');" id="extra_project_image_middle">
                {{-- Extra Image Input --}}
                <input type="file" class="cp__extra-input" name="project_image[2]"  onchange="loadFile(event, 'extra_middle')">
                @error('project_image[]')
                    <p style="color: white">{{ $message }}</p>
                @enderror
            </div>

            <div class="cp__extra-image "style="background-image: url('https://via.placeholder.com/150');" id="extra_project_image_right">
                {{-- Extra Image Input --}}
                <input type="file" class="cp__extra-input" name="project_image[3]"  onchange="loadFile(event, 'extra_right')">
                @error('project_image[]')
                    <p style="color: white">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="cp__submit">
            <input type="submit" class="cp__submit-button nav-button" value="Create Project">
        </div>
    </form>
</div>
@endsection

@section('footer-position')
footer-relative
@endsection

@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#editorProjects' ) )
        .catch( error => {
            console.error( error );
        } );

        let loadFile = function(event, whichImage) {
            let image;
            // Get which element needs to be filled with inserted background
            switch (whichImage) {
            case 'thumb':
                image = document.getElementById('thumb_background');
                break;
            case 'extra_left':
                image = document.getElementById('extra_project_image_left');
                break;
            case 'extra_middle':
                image = document.getElementById('extra_project_image_middle');
                break;
            case 'extra_right':
                image = document.getElementById('extra_project_image_right');
                break;
            }

            // Set background image
            image.style.backgroundImage = 'url('+ URL.createObjectURL(event.target.files[0]) +')';
        };
</script>
@endsection
