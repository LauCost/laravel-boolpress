@extends('layouts.app')

@section('content')

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-9">
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

                                    <img class="card-img-top" src="{{ $post->img }}" alt="">

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
            </div>

            <aside class="col-md-3">

                <div class="card">
                    <div class="card-body">

                        <h3>
                            Categorie
                        </h3>

                        <ul>

                            @foreach ($categories as $category)

                                <li>
                                    <a href="{{ route('categories.post', $category->slug) }}">{{ $category->name }}</a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@endsection
