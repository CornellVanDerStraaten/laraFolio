@extends('layouts.layout')

@section('content')
<div>
    <table class="table">
        <tr><td><h1>{{ $project->title }}</h1></td></tr>
        <tr><td>{{ $project->keywords }}</td></tr>
        <tr><td>{{ $project->content }}</td></tr>
        <tr><td>{{ $project->published_date }}</td></tr>
    </table>
</div>
@endsection
