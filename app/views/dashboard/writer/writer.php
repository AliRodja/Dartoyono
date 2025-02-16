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
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card p-3 shadow">
                    <h5 class="text-center">Welcome, <?= htmlspecialchars($_SESSION['user']['full_name']); ?>!</h5>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="list-group-item"><a href="/create_post" class="btn btn-primary btn-sm">Buat Artikel</a></li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <div class="card p-4 shadow">
                    <h2 class="mb-4">Daftar Artikel Saya</h2>

                    <!-- Alert Messages -->
                    <?php if (isset($_SESSION['alert_message'])): ?>
                        <div class="alert alert-<?= $_SESSION['alert_type']; ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['alert_message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert_message'], $_SESSION['alert_type']); ?>
                    <?php endif; ?>

                    <!-- Daftar Artikel -->
                    <?php if (count($articles) > 0): ?>
                        <div class="list-group">
                            <?php foreach ($articles as $article): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <img src="<?= $article['image_url']; ?>" alt="Thumbnail" class="img-thumbnail me-3" style="width: 80px; height: 60px; object-fit: cover;">
                                        <div>
                                            <h5 class="mb-1"><?= htmlspecialchars($article['title']); ?></h5>
                                            <small class="text-muted"><?= date('d M Y', strtotime($article['created_at'])); ?> | Kategori: <strong><?= htmlspecialchars($article['category']); ?></strong></small>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/edit_post/id=<?= htmlspecialchars($article['post_id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/delete_post/id=<?= htmlspecialchars($article['post_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">Anda belum memiliki artikel.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
