<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="hero-title mb-4">Choose your Coffee & Space</h1>
                <p class="lead mb-4">Dartoyo Coffee has been serving 20,000+ cups of coffee and providing a comfortable place for our customers to work since 2024.</p>
            </div>
            <div class="col-lg-6">
                <img src="C:\laragon\www\Dartoyono\app\assets\halaman_utama.png" alt="Coffee Shop Interior" class="img-fluid coffee-image">
            </div>
        </div>
    </div>
</section>

<section class="space-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="space-title">We Provide Your Space For Your Work or Mini event With Your Favorite Coffee.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <p>Pabrik Kopi Dartoyo is a new go-to spot for coffee lovers in Bandung, bringing a modern and cozy vibe since its opening in late October 2024.</p>
            </div>
            <div class="col-md-6 mb-4">
                <p>With a spacious area and great facilities, we're not just another coffee shop—we're a place where you can unwind, have great conversations, and capture memorable moments.</p>
            </div>
        </div>
    </div>
</section>

<section class="news-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Artikel Terbaru</h2>
        <?php if (!empty($posts)) : ?>
            <div class="row">
                <?php 
                $latestPosts = array_slice($posts, 0, 6); // Hanya menampilkan 6 artikel pertama
                foreach ($latestPosts as $post) : ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm news-card">
                            <?php if ($post['image_url']) : ?>
                                <div class="news-image-wrapper">
                                    <img src="<?php echo $post['image_url']; ?>" class="card-img-top" alt="<?php echo $post['title']; ?>">
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h6 class="card-title fw-bold text-dark"><?php echo htmlspecialchars($post['title']); ?></h6>
                                <p class="card-text text-muted small"><?php echo htmlspecialchars(substr($post['content'], 0, 80)); ?>...</p>
                                <a href="/view_post/<?php echo $post['post_id']; ?>" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                            </div>
                            <div class="card-footer small text-muted text-center">
                                <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tombol Lihat Semua Artikel
            <div class="text-center mt-4">
                <a href="/all_posts" class="btn btn-outline-primary">Lihat Semua Artikel</a>
            </div> -->

        <?php else : ?>
            <div class="alert alert-info text-center">Tidak ada artikel yang tersedia.</div>
        <?php endif; ?>
    </div>
</section>

<style>
    .news-section {
        background-color: #f8f9fa;
        padding: 40px 0;
    }
    .news-card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    .news-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
    .news-image-wrapper {
        height: 160px;
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }
    .news-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .card-body {
        padding: 15px;
    }
    .card-title {
        font-size: 16px;
        margin-bottom: 8px;
    }
    .card-text {
        font-size: 14px;
    }
    .btn-sm {
        font-size: 14px;
        padding: 6px 12px;
    }
    .card-footer {
        font-size: 12px;
    }
    .btn-outline-primary {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        text-transform: uppercase;
    }
</style>


