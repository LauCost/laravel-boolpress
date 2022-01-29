@extends('layouts.app')

@section('content')

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Category: {{ $category->name }}</h1>
            <p class="lead">Tutti i post di questa categoria</p>
        </div>
    </div>

    <div class="container">


        <div class="row gy-2">

            @forelse ($posts as $post)

                <div class="col-md-4">

                    <div class="card">

                        <h4 class="card-title">
                            {{ $post->title }}
                        </h4>

                        <h6 class="card-title">
                            {{ $post->sub_title }}
                        </h6>

                        <img class="card-img-top" src="{{ $post->image }}" alt="">

                        <p class="card-text">
                            {{ $post->body }}
                        </p>

                        <a href="{{ route('posts.show', $post->slug) }}">
                            Vedi il Post
                        </a>

                    </div>


                </div>

            @empty

                <div class="col">
                    <p>
                        Nothing
                    </p>
                </div>


            @endforelse
        </div>

    </div>

@endsection
