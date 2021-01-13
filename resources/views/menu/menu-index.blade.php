@extends('layouts.app')

@section('content')
    <div class="container">
        <menu-container :items="{{ $menus }}" :resto-id="{{ $resto_id }}"></menu-container>
    </div>
@endsection
