@extends('layouts.layout')

@section('header-extra')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="createProject__container">
    <form class="cp__form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title Input --}}
        <input class="cp__title-input" type="text" name="title" placeholder="Titel" value="{{ old('title') }}" required>
        @error('title')
            <p style="color: white">{{ $message }}</p>
        @enderror

        {{-- Keyword Input --}}
        <input class="cp__keyword-input" type="text" name="keywords" placeholder="Keywords"  value="{{ old('keywords') }}" required>
        @error('keywords')
            <p style="color: white">{{ $message }}</p>
        @enderror

        {{-- Div to hold link inputs --}}
        <div class="cp__link-inputs">
            {{-- Live Link Input --}}
            <input class="cp__link-input" type="text" name="live_link" value="{{ old('live_link') }}" placeholder="Live website link">
            @error('live_link')
                <p style="color: white">{{ $message }}</p>
            @enderror

            {{-- Github Link Input --}}
            <input class="cp__link-input" type="text" name="github_link" value="{{ old('github_link') }}" placeholder="Github link">
            @error('github_link')
                <p style="color: white">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thumbnail Image Input --}}
        <input type="file" class="cp__thumb-input" name="thumbnail_image">
        @error('thumbnail_image')
            <p style="color: white">{{ $message }}</p>
        @enderror

        <input class="cp__slug-input" type="text" name="slug" placeholder="Slug" value="{{ old('slug') }}" required>
        @error('slug')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <textarea class="cp__content-textarea" name="content" id="tinyEditor" cols="30" rows="10" value="{{ old('content') }}" required ></textarea>
        @error('content')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <select name="active">
            <option value="1">Publiceer</option>
            <option value="0">Verberg</option>
        </select>
        @error('active')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <input type="date" name="published_date" value="{{ old('published_date') }}">
        @error('published_date')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <input type="submit">
    </form>
</div>
@endsection
