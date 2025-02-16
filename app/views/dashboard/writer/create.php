<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css"> <!-- Tambahkan CSS custom jika diperlukan -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Writer Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Container -->
    <div class="container mt-5">
        <div class="row">
            <!-- Alert Messages -->
            <?php if (isset($_SESSION['alert_message'])): ?>
                <div class="alert alert-<?= $_SESSION['alert_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['alert_message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['alert_message'], $_SESSION['alert_type']); ?>
            <?php endif; ?>
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5 class="text-center">Welcome, <?= htmlspecialchars($_SESSION['user']['full_name']); ?>!</h5>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="list-group-item"><a href="/create-article" class="btn btn-primary btn-sm">Buat Artikel</a></li>
                    </ul>
                </div>
            </div>
            

            <!-- Content -->
            <div class="col-md-9">
                <div class="card p-4 shadow">
                    <h2 class="mb-4">Buat Artikel Baru</h2>

                    <form action="/create_post" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul..." required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Deskripsi Artikel</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Tulis deskripsi..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Gambar Artikel</label>
                            <input type="file" class="form-control" id="image_url" name="image_url" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" name="category" id="category" required>
                                <option value="news">Berita</option>
                                <option value="coffee">Kopi</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Publikasikan Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
