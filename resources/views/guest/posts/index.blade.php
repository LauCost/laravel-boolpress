@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="row gy-2">

            @foreach ($posts as $post)

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

            @endforeach
        </div>

    </div>

@endsection
