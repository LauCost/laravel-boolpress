@extends('layouts.admin')


@section('content')

    <h1>Edit the Post</h1>

    @include('partials.errors')

    <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
        @csrf

        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                aria-describedby="titleHelper" value="{{ $post->title }}">
            <small id="titleHelper" class="text-muted">Type a title for your post</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Title</label>
            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Sub Title"
                aria-describedby="sub_titleHelper" value="{{ $post->sub_title }}">
            <small id="sub_titleHelper" class="text-muted">Type a sub title for your post</small>
            @error('sub_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" id="image" class="form-control" placeholder="https://"
                aria-describedby="imageHelper" value="{{ $post->image }}">
            <small id=" imageHelper" class="text-muted">Type a image for your post</small>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categorie</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)

                    <option value="{{ $category->id }}" {{ $category->id === $post->category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>

                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Text</label>
            <textarea class="form-control" name="body" id="body" rows="5">{{ $post->body }}</textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
    </form>
@endsection
