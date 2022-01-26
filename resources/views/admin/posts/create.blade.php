@extends('layouts.admin')


@section('content')

    <h1>Create a new Product</h1>

    @include('partials.errors')

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                aria-describedby="titleHelper" value="{{ old('title') }}">
            <small id="titleHelper" class="text-muted">Type a title for your post</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="https://"
                aria-describedby="imageHelper" value="{{ old('image') }}">
            <small id=" imageHelper" class="text-muted">Type a image for your post</small>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" placeholder="author"
                aria-describedby="authorHelper" value="{{ old('author') }}">
            <small id="authoreHelper" class="text-muted">Type a Author for your post</small>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ old('name') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
    </form>
@endsection
