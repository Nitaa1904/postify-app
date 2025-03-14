@extends('layouts.app')

@section('title')
Buat Postingan
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card custom-card p-4 shadow-sm">
            <h2 class="mb-4 text-center text-navy fw-bold">Buat Postingan</h2>
            <form method="POST" action="{{ url('posts') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" class="form-control input-custom" id="title" name="title"
                        placeholder="Masukkan judul..." required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten</label>
                    <textarea class="form-control input-custom" id="content" name="content" rows="5"
                        placeholder="Tulis konten di sini..." required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-create">Simpan</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-back">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection