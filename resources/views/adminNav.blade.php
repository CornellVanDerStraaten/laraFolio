@extends('layouts.layout')

@section('content')
<div class="adminNav__container">
    <div class="adminNav__card">
        <div class="adminNav__card-header">
            <i class="adminNav__card-icon fas fa-pencil-ruler"></i>
            <h2 class="adminNav__card-title">Projecten</h2>
        </div>
        <p class="adminNav__card-text">Hier kan je terecht om projecten toe te voegen, editen of te deleten! Ook gaan hier later statistieken staan.</p>
        <div class="adminNav__card-footer">
            <a class="adminNav__card-link nav-button a-tag_component" href="{{ route('admin.projects') }}">Naar projecten</a>
        </div>
    </div>

    <div class="adminNav__card">
        <div class="adminNav__card-header">
            <i class="adminNav__card-icon fas fa-pen-fancy"></i>
            <h2 class="adminNav__card-title">Artikels</h2>
        </div>
        <p class="adminNav__card-text">Hier kan je terecht om artikels toe te voegen, editen of te deleten! Ook gaan hier later statistieken staan.</p>
        <div class="adminNav__card-footer">
            <a class="adminNav__card-link nav-button a-tag_component" href="{{ route('admin.projects') }}">Naar artikels</a>
        </div>
    </div>

    <div class="adminNav__card">
        <div class="adminNav__card-header">
            <i class="adminNav__card-icon fas fa-users"></i>
            <h2 class="adminNav__card-title">Users</h2>
        </div>
        <p class="adminNav__card-text">Hier kan je terecht om users toe te voegen, gegevens te editen, rechten te veranderen of te deleten!</p>
        <div class="adminNav__card-footer">
            <a class="adminNav__card-link nav-button a-tag_component" href="{{ route('admin.projects') }}">Naar users</a>
        </div>
    </div>

    <div class="adminNav__card">
        <div class="adminNav__card-header">
            <i class="adminNav__card-icon fas fa-tools"></i>
            <h2 class="adminNav__card-title">Overig</h2>
        </div>
        <p class="adminNav__card-text">Hier kan je terecht voor overige instellingen en statistieken.</p>
        <div class="adminNav__card-footer">
            <a class="adminNav__card-link nav-button a-tag_component" href="{{ route('admin.projects') }}">Naar overig</a>
        </div>
    </div>




</div>
@endsection
