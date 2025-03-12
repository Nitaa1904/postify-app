<div
    style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; font-family: Arial, sans-serif; background-color: #f9f9f9;">
    <h2 style="color: #333; text-align: center;">Ada Postingan Baru!</h2>
    <p style="font-size: 16px; color: #555; text-align: center;">Saya baru saja membuat postingan baru. Cek isinya di
        bawah ini:</p>

    <div style="background-color: #fff; padding: 15px; border-radius: 6px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <h3 style="color: #007bff; margin-bottom: 10px;">{{ $post->title }}</h3>
        <p style="color: #333; font-size: 14px; line-height: 1.5;">{{ $post->content }}</p>
    </div>

    <p style="text-align: center; margin-top: 20px;">
        <a href="{{ route('posts.show', $post->id) }}"
            style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Baca
            Selengkapnya</a>
    </p>
</div>