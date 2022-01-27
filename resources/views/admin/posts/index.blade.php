@extends('layouts.admin')

@section('content')

    <h1>
        Tutti i Posts
    </h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Image</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)

                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="100" src="{{ $post->image }}" alt=""></td>
                    <td>{{ $post->sub_title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->slug) }}">
                            View
                        </a> -
                        <a href="{{ route('admin.posts.edit', $post->slug) }}">
                            Edit
                        </a> -
                        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                            @csrf

                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            <div class="admin_pages">

                {{ $posts->links() }}

            </div>

        </tbody>
    </table>


@endsection
