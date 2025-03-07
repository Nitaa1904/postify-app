@extends('layouts.app')

@section('title')
Postify
@endsection

@section('content')
<h1 class="text-center mb-4 d-flex justify-content-between align-items-center">
    Blog Posts
    <a class="btn btn-success" href="{{ url('posts/create') }}">+ Buat Postingan</a>
</h1>

<div class="row">
    @foreach($posts as $post)
    <div class="col-md-6 mb-4">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }} </h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text text-muted">Last Updated at
                    {{date("d M Y H:i", strtotime($post->created_at )) }}</p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-primary btn-sm">Read More</a>
                <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection