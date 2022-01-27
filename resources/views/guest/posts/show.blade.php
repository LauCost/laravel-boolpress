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
            Categoria: {{ $post->category != null ? $post->category->name : 'Senza Categoria' }}
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
