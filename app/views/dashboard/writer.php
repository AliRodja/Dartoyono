<h1>Welcome, Writer <?= $_SESSION['user']['full_name'] ?>!</h1>
<img src="<?= $_SESSION['user']['profile_photo'] ?>" width="100">
<a href="/logout">Logout</a>

<h2>Buat Artikel Baru</h2>

<form action="/store_post" method="POST" enctype="multipart/form-data">
    <label for="title">Judul Artikel</label>
    <input type="text" id="title" name="title" required>

    <label for="content">Deskripsi Artikel</label>
    <textarea id="content" name="content" required></textarea>

    <label for="image_url">Gambar Artikel</label>
    <input type="file" id="image_url" name="image_url" required>

    <label for="category">Kategori</label>
    <select name="category" id="category" required>
        <option value="news">Berita</option>
        <option value="coffee">Kopi</option>
    </select>

    <button type="submit">Publikasikan Artikel</button>
</form>