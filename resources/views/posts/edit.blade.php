@extends('layouts.app')
@section('title')
Ubah Postingan
@endsection
@section('content')
<div class="card custom-card p-4">
    <h2 class="mb-4">Ubah Postingan</h2>
    <form method="POST" action="{{ url('posts/' . $post->id) }}">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <form method="POST" action="{{ url("posts/$post->id") }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>

</div>
@endsection