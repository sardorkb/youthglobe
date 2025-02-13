@extends('admin.layouts.master')

@section('title', $post->title . ' | Youth Globe')

@section('main-content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $post->title }}</h4>
                    <p class="text-muted">{{ $post->category->title ?? 'N/A' }}</p>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $post->id }}</p>
                    <p><strong>Slug:</strong> {{ $post->slug }}</p>
                    <p><strong>Summary:</strong> {{ $post->summary }}</p>
                    <p><strong>Description:</strong> {!! $post->description !!}</p>
                    <p><strong>Quote:</strong> {!! $post->quote !!}</p>

                    @if($post->photo)
                        <div class="mt-3">
                            <strong>Photo:</strong>
                            <img src="{{ asset('storage/'.$post->photo) }}" alt="{{ $post->title }}" class="img-fluid">
                        </div>
                    @else
                        <p class="text-muted">No image available.</p>
                    @endif

                    @if($post->youtube_link)
                        <div class="mt-3">
                            <strong>YouTube Link:</strong> 
                            <a href="https://www.youtube.com/watch?v={{ $post->youtube_link }}" target="_blank">Watch Video</a>
                        </div>
                    @endif

                    <p><strong>Tags:</strong> 
                        @if($post->tags && $post->tags->isNotEmpty())
                            @foreach($post->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        @else
                            <span class="badge badge-secondary">No tags available</span>
                        @endif
                    </p>

                    <p><strong>Category ID:</strong> {{ $post->post_cat_id }}</p>
                    <p><strong>Tag ID:</strong> {{ $post->post_tag_id }}</p>

                    <p><strong>Status:</strong> 
                        @if($post->status == 'active')
                            <span class="badge badge-success">{{ ucfirst($post->status) }}</span>
                        @else
                            <span class="badge badge-warning">{{ ucfirst($post->status) }}</span>
                        @endif
                    </p>

                    <p><strong>Created At:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
                    <p><strong>Updated At:</strong> {{ $post->updated_at->format('Y-m-d H:i') }}</p>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('post.index') }}" class="btn btn-secondary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
