@extends('layouts.app')

@section('content')
    <div class="container">
        <resto-group :restos="{{ $restos }}"></resto-group>
        <menu-container :items="{{ $menus }}" :resto-id="{{ $resto_id }}"></menu-container>
    </div>
@endsection
