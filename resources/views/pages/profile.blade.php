@extends('layouts.app')

<x-header> 
    <x-site-title :name="$site_title"/>
    <x-link name="back to Feed" href="/" class="btn btn-header" />
    <x-post-counter :count="$post_count" />
</x-header>

@section('content')

<div class="container py-4">
        <div class="row">
            <div class="col-4">
                <x-search link="{{ route('profile_search', $user->id) }}" />
            </div>
        </div>
        <div class="row">
            @isset($posts)
                @foreach ($posts as $post)
                    <div class="col-md-6">
                        <x-post 
                            link="#" 
                            user="{{ $post->user->username }}" 
                            date="{{ $post->created_at->format('d/m/Y H:i') }}" 
                            image="/images/{{ $post->image }}" 
                            title="{{ $post->title }}" 
                        />
                    </div>
                @endforeach
            @else
                <p class="text-center">It seems there are no posts yet. Upload some images or come back later.</p>
            @endisset
        </div>
    </div>

@endsection