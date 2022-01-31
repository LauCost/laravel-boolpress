@extends('layouts.admin')


@section('content')

    <h1>Create a new Post</h1>

    @include('partials.errors')

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                aria-describedby="titleHelper" value="{{ old('title') }}">
            <small id="titleHelper" class="text-muted">Type a title for your post</small>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sub_title" class="form-label">Sub Title</label>
            <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Sub Title"
                aria-describedby="sub_titleHelper" value="{{ old('sub_title') }}">
            <small id="sub_titleHelper" class="text-muted">Type a sub title for your post</small>
            @error('sub_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" name="img" id="img" class="form-control" placeholder="https://"
                aria-describedby="imgHelper" value="" accept=".jpg,.png">
            <small id=" imgHelper" class="text-muted">Type a image for your post</small>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categorie</label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="" selected>Seleziona una categoria</option>
                @foreach ($categories as $category)

                    <option value="{{ $category->id }}">
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
            <textarea class="form-control" name="body" id="body" rows="5">{{ old('body') }}</textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
    </form>
@endsection
