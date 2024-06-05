@extends('layouts.app')

@section('title', __('Welcome Page'))

@section('content')
<div class="flex-container d-flex justify-content-center align-items-center bg-dark">
    <div class="container">
        <div class="card mx-auto py-5">
            @php
                $locale = app()->getLocale();
                $flagPath = "images/{$locale}-flag.png";
            @endphp

            <img class="card-img-top mx-auto" src="{{ asset($flagPath) }}" alt="Flag">
            
            <div class="card-body text-center">
                <h1 class="card-title display-4 mb-4">
                    {{ __('welcome') }}
                </h1>

                <h2 class="card-subtitle mb-4">
                    {{ __('title') }}
                </h2>

                <p class="card-description">
                    {{ __('description') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
