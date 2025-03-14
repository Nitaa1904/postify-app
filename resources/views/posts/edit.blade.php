@extends('layouts.app')
@section('title')
Ubah Postingan
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card custom-card p-4 shadow-sm">
            <h2 class="mb-4 text-center text-navy fw-bold">Edit Postingan</h2>
            <form method="POST" action="{{ url('posts/' . $post->id) }}">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" class="form-control input-custom" id="title" name="title"
                        value="{{ $post->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten</label>
                    <textarea class="form-control input-custom" id="content" name="content" rows="5"
                        required>{{ $post->content }}</textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-update">Update</button>
                </div>
            </form>

            <hr class="my-4">

            <form method="POST" action="{{ url("posts/$post->id") }}"
                onsubmit="return confirm('Apakah kamu yakin ingin menghapus postingan ini?');">
                @method('DELETE')
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-back">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection