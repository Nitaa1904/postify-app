@extends('layouts.app')

@section('title')
Buat Postingan
@endsection

@section('content')
<div class="card custom-card p-4">
    <h2 class="mb-4">Buat Postingan</h2>
    <form method="POST" action="{{ url('posts') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection