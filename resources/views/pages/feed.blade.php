@extends('layouts.app')

<x-header>
    <x-site-title name="Feed" />
    <x-link name="New Post" href="#exampleModal" class="btn btn-header" data-toggle="modal" />

    <!-- ovo maknit u komponentu neku negdi -->

    <x-modal>
        <x-slot name="title">Upload an image</x-slot>
        <x-slot name="body">
            <form action="{{ route('posts_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image_title">Title</label>
                    <input type="text" class="form-control" id="image_title" name="title" aria-describedby="image title" placeholder="Enter image title">
                </div>
                <div class="form-group">
                    <label for="image_file">Image</label>
                    <input type="file" class="form-control-file" id="image_file" name="image">
                </div>
                <x-button type="submit" name="Save Image" class="btn btn-primary btn-block" />
            </form>
        </x-slot>
    </x-modal>

</x-header>

@section('content')

<!-- od ovoga se isto moze napravit komponenta posto je ista na obe stranice -->

    <div class="container py-4">
        <div class="row">
            <div class="col-4">
                <x-search link="{{ route('feed_search') }}" />
            </div>
        </div>
        <div class="row">
            @isset($posts)
                @foreach ($posts as $post)
                    <div class="col-md-6">
                        <x-post 
                            link="{{ route('profile', $post->user->id) }}" 
                            user="{{ $post->user->username }}" 
                            date="{{ $post->created_at->format('d/m/Y H:i') }}" 
                            image="/images/{{ $post->image }}" 
                            title="{{ $post->title }}" 
                        />
                    </div>
                @endforeach
                    <div class="col-12">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
            @else
                <p class="text-center">It seems there are no posts yet. Upload some images or come back later.</p>
            @endisset
        </div>
    </div>

@endsection