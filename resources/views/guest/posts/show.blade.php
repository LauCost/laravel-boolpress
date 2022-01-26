@extends('layouts.app')

@section('content')

    <div class="">

        <h4 class="card-title">
            {{ $post->title }}
        </h4>

        <img class="" src="{{ $post->image }}" alt="">

        <p class="card-text">
            {{ $post->description }}
        </p>

    </div>

@endsection
