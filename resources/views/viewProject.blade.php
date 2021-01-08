@extends('layouts.layout')

@section('content')
<div>
    <table class="table">
        <tr class="row"><td><h1>{{ $project->title }}</h1></td></tr>
        <tr><td>{{ $project->keywords }}</td></tr>
        <tr><td>{{ $project->content }}</td></tr>
        <tr><td>{{ $project->published_date }}</td></tr>
        <tr><td><img src="{{ asset('storage/' . $project->thumbnail_image ) }}" alt="Foto"></td></tr>

    </table>
</div>
@endsection
