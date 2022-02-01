@extends('layouts.app')

@section('content')

    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Contattaci</h1>
            <p class="lead">Fabio vi aiuterà</p>

        </div>
    </div>



    <div class="container">
        @include('partials.errors')

        @if (session('message'))

            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>


        @endif

        <form action="{{ route('contacts.send') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name"
                            aria-describedby="nameHelper" required minlength="4" maxlength="50" value="{{ old('name') }}">
                        <small id="nameHelper" class="text-muted">Scrivi il tuo nome</small>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Your email"
                            aria-describedby="emailHelper" required value="{{ old('email') }}">
                        <small id="emailHelper" class="text-muted">Scrivi la tua email</small>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea class="form-control" name="message" id="message" rows="5">{{ old('message') }}</textarea>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary text-white">Send</button>
        </form>
    </div>

@endsection
