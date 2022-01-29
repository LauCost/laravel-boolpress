@extends('layouts.app')

@section('content')

    <div class="container">

        <img class="img-fluid" src="{{ $post->image }}" alt="">

        <h1 class="card-title">
            {{ $post->title }}
        </h1>
        <h4 class="card-title">
            {{ $post->sub_title }}
        </h4>
        <p class="card-text">
            {{ $post->body }}
        </p>

        <div class="category">


            @if ($post->category)
                Categoria: <a href="{{ route('categories.post', $post->category->slug) }}">{{ $post->category->name }}</a>
            @else
                Senza Categoria
            @endif
        </div>

        @auth

            <div class="action">
                <a href="#">
                    Back to Admin
                </a>
            </div>

        @endauth

    </div>

@endsection
