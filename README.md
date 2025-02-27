# LARAVEL 9 PROJECT Postify

## Alur Kerja Laravel

### Inisiasi Project

-   composer create-project laravel/laravel:^9.0 example-app
    atau (better dibawah ini)
-   composer global require laravel/installer
-   laravel new example-app
-   cd example-app
-   php artisan serve

noted jika error tampilanya

-   start dan buat database baru di mysql(xampp) sesuai dengan nama database di .env - CREATE DATABASE example_app; (dipowersell xampp)
-   jalankan perintah php artisan migrate diterminal vscode dan setelahnya php artisan serve

### Struktur Folder

-   app
    -   Http (controllers)
    -   Models
-   config
-   database
-   resources
    -   views
-   routes

### Alur Dasar Laravel (MVC)

![alt text](public/build/assets/image1.png)

### Membuat Routing

-   routes/web.php

```php
Route::get('hello', function(){
    return view('hello');
});
```

return membalikan nilai ke route dalam laravelmakanya gak pakai echo yang hanya menampilkan

-   buat file hello.blade.php di resources/views

### Routing Menuju Controller

-   membuat controller
    `php artisan make:controller HelloController`
-   masukan HelloController ke routes/web.php
    Cara 1

    ```php
    Route::get('hello', 'App\Http\Controllers\HelloController@index');
    ```

    Cara 2

    ```php
    Route::get('hello', [HelloController::class, 'index']);
    ```

-   buat route ke2 sebagai perbandingan
    ```php
    Route::get('word', [HelloController::class, 'word_message']);
    ```
    bisa membuat custom dengan url apa method apa
-   buat function word_message di HelloControler
    ```php
    function word_message(){
            echo "word";
        }
    ```

## Pendalaman Project

### Project Overview

![alt text](public/build/assets/image2.png)

To Do

1. Membuat struktur sederhana didalam file
2. Membuat endpoint dari beberata HTTP method (GET, POST, PATCH, PUT, DELETE)
3. Membuat form untuk posting blog dan komentar
4. Membuat relasi database sederhana
5. Query database menggunakan query buuilder & Eloquent di Laravel
6. Membuat tampilan blog menggunakan template dari Boostrap
7. Membuat validasi input dari client
8. Mengirim notifikasi (Email & Telegram)

### Metode HTTP

![alt text](public/build/assets/image3.png)

-   misal menambahkan post untuk url hello (routes dan controller)

### Resource Controller

![alt text](public/build/assets/image4.png)

-   membuat resource controller
    `php artisan make:controller PostController --resource`
-   yang akan otomatis membuat controller yang memuat CRUD

    | Verb      | URI                  | Action  | Route Name     |
    | --------- | -------------------- | ------- | -------------- |
    | GET       | /photos              | index   | photos.index   |
    | GET       | /photos/create       | create  | photos.create  |
    | POST      | /photos              | store   | photos.store   |
    | GET       | /photos/{photo}      | show    | photos.show    |
    | GET       | /photos/{photo}/edit | edit    | photos.edit    |
    | PUT/PATCH | /photos/{photo}      | update  | photos.update  |
    | DELETE    | /photos/{photo}      | destroy | photos.destroy |

-   buat routenya untuk test aja
    ```php
    Route::resource('posts', PostController::class);
    ```

### Percantik Route Controllernya secara lengkap

-   route index
    ```php
    Route::get('post', [PostController::class, 'index']);
    ```
-   PostContrrolernya bagian index arahkan ke view dan buat folder views/post/index.blade.php
    ```php
    public function index()
        {
            // mengirim data
            $view_data = [
                // ini nantinya adalah daftar dari list (array dalam array yang menandakan field apa aja yang ada di dalam array)
                'posts' => [
                    //Tittle     Content
                    ["Mengenal Laravel", "Ini adalah blog utuk mengenal laravel"],
                    ["Dia", "ini hanya tentang dia"]
                    ]
            ]; // harus dalam bentuk array
            return view('posts.index', $view_data);
        }
    ```
-   buat looping di views/post/index.blade.php untuk menampilkan daftar listnya
    ```html
    <div>
        @php($number = 1)
        <!-- Lakukan looping untuk menampilkan daftar list -->
        @foreach($posts as $post)
        <div class="blog">
            <h3>{{ $post[0] }} <small>#{{ $number }}</small></h3>
            <p>{{ $post[1] }}</p>
        </div>
        @php($number++) @endforeach
    </div>
    ```

### Instalasi Booststrap

-   letakan di file2 views untuk styling

```html
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
/>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
```

### Menyimpan File (bukan di database)

-   Buat file storage/app/post.txt dan isi satu baris itu satu konten
-   tambahkan ini di PostController
    `use Illuminate\Support\Facedes\Storage;`
-   memproses file posts.txt dengan debuggig

    ```php
    public function index()
    {
        $path = storage_path('app/posts.txt');

        if (!file_exists($path)) {
            dd("File tidak ditemukan!");
        }

        // Ambil isi file
        $posts = file_get_contents($path);

        // Hapus karakter tak terlihat seperti tanda kutip ganda, whitespace ekstra
        $posts = trim($posts, "\" \n\r");

        // Pisahkan data berdasarkan baris
        $posts = explode("\n", $posts);

        $view_data = [
            'posts' => $posts
        ];

        return view('posts.index', $view_data);
    }
    ```

-   sesuaikan index array di index.blade.php

### Menampilkan Detail Data dari File

-   buat route untuk get id
    ```php
    Route::get('posts/{id}', [PostController::class, 'show']);
    ```
-   buat file views/posts/show.blade.php dan isi
-   buat controllernya show

    ```php
    public function show($id)
        {
            $path = storage_path('app/posts.txt');

            if (!file_exists($path)) {
                abort(404, "File tidak ditemukan");
            }

            $posts = file_get_contents($path);
            $posts = explode("\n", trim($posts));

            // Cari post berdasarkan ID
            foreach ($posts as $post) {
                $data = explode(",", $post);
                if ($data[0] == $id) {
                    return view('posts.show', ['post' => $data]);
                }
            }

            abort(404, "Post tidak ditemukan");
        }
    ```

### Membuat Form Tambah Data
