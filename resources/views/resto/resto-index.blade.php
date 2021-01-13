@extends('layouts.app')

@section('content')
    <div class="container">
        <resto-group :restos="{{ $restos }}"></resto-group>
    </div>
@endsection
