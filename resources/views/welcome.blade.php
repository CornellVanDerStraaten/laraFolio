@extends('layouts.layout')

@section('content')
    <h1>Projecten</h1>
    <table>
    @foreach($projects as $project)
    <tr class="voorbeeld-table">
        <td><h2>{{ $project->title }}</h2></td>
        <td><h2>Gepubliceerd op: {{ $project->published_date }}</h2></td>
        <td><a href="/project/{{ $project->slug }}" class="voorbeeld-link a-tag_component nav-button">Lees meer</a></td>
    </tr>
    @endforeach
    </table>
@endsection
