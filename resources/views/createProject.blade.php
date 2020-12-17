@extends('layouts.layout')

@section('content')
<div class="createProject__container">
    <form class="cP__form" action="{{ route('projects.store') }}">
        @csrf
        <input class="cp__title-input" type="text" name="text">
    </form>
</div>
@endsection
