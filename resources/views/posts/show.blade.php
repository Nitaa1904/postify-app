<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postify | Judul: {{ $post->title}} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Blog Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Post -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card custom-card p-4">
                    <h2 class="display-5 fw-bold">{{ $post->title }}</h2>
                    <p class="blog-post-meta text-muted">Published on
                        {{date("d M Y H:i", strtotime($post->created_at )) }} by
                        <a href="#" class="text-decoration-none text-dark fw-semibold">Me</a>
                    </p>
                    <hr>
                    <p class="lead">{{ $post->content }}</p>

                    <div class="mt-4">
                        <h5 class="fw-bold">Comments</h5>
                        <!-- menampilkan banyaknya komentar -->
                        <small class="text-muted">{{ $total_comments }} Komentar</small>
                        @foreach($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-0" style="font-size: 8pt;">{{ $comment->comment }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>&copy; 2025 Blog Laravel. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>