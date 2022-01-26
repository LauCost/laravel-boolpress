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

                        <img class="card-img-top" src="{{ $post->image }}" alt="">

                        <p class="card-text">
                            {{ $post->description }}
                        </p>

                        <a href="{{ route('guest.posts.show', $post->id) }}">
                            Vedi il Post
                        </a>

                    </div>


                </div>

            @endforeach
        </div>

    </div>

@endsection
