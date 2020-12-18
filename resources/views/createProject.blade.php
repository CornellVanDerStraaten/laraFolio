@extends('layouts.layout')

@section('header-extra')
<script src="https://cdn.tiny.cloud/1/tzm3w2o3juzjq71ip92kwtit6fvnmz7xqqutxiq219xaw7o5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<div class="createProject__container">
    <form class="cP__form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="cp__title-input" type="text" name="title" placeholder="Titel" value="{{ old('title') }}" required>
        @error('title')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <input class="cp__keyword-input" type="text" name="keywords" placeholder="Keywords"  value="{{ old('keywords') }}" required>
        @error('keywords')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <input class="cp__link-input" type="text" name="live_link" value="{{ old('live_link') }}" placeholder="Live website link">
        @error('live_link')
            <p style="color: white">{{ $message }}</p>
        @enderror
        <input class="cp__link-input" type="text" name="github_link" value="{{ old('github_link') }}" placeholder="Github link">
        @error('github_link')
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
        <label for="checkbox">Publish meteen?</label>
        <input type="checkbox" id="checkbox" name="active" checked>
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
