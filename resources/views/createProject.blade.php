@extends('layouts.layout')

@section('header-extra')
<script src="https://cdn.tiny.cloud/1/tzm3w2o3juzjq71ip92kwtit6fvnmz7xqqutxiq219xaw7o5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
<div class="createProject__container">
    <form class="cP__form" action="{{ route('projects.store') }}">
        @csrf
        <input class="cp__title-input" type="text" name="text">
    </form>
</div>
@endsection
