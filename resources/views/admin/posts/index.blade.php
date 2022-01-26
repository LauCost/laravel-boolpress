@extends('layouts.admin')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Posted at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)

                <tr>
                    <td scope="row"></td>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->posted_at }}</td>
                    <td>
                        <a href="#">
                            View
                        </a> -
                        <a href="#">
                            Edit
                        </a> -
                        <a href="#">
                            Delete</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>


@endsection
