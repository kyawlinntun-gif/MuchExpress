@extends('layouts.app')

@section('content')
    <div class="container">
        <menu-container :items="{{ $categories }}"></menu-container>
    </div>
@endsection
