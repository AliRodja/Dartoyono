

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Artikel</title>
</head>
<body>

<h2>Buat Artikel Baru</h2>

<form action="create_post.php" method="POST" enctype="multipart/form-data">
    <label for="title">Judul Artikel</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Deskripsi Artikel</label>
    <textarea id="description" name="description" required></textarea>

    <label for="image_url">Gambar Artikel</label>
    <input type="file" id="image_url" name="image_url" required>

    <label for="category">Kategori</label>
    <select name="category" id="category" required>
        <option value="news">Berita</option>
        <option value="coffee">Kopi</option>
    </select>

    <button type="submit">Publikasikan Artikel</button>
</form>

</body>
</html>
