<div class="container">
    <h1 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h1>
    <p class="post-meta">Diposting pada: <?php echo date('d M Y', strtotime($post['created_at'])); ?></p>

    <?php if (!empty($post['image_url'])) : ?>
        <img src="/<?php echo ($post['image_url']); ?>" class="img-fluid" style="width:100%; border-radius:10px; margin-bottom:20px;">
    <?php endif; ?>
    
    <p class="post-content"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

    <div class="comment-box">
        <h3>Komentar</h3>
        <?php if (!empty($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="comment">
                    <strong><?php echo htmlspecialchars($comment['created_by'] ?? 'Anonim'); ?></strong> - 
                    <small><?php echo date('d M Y H:i', strtotime($comment['created_at'])); ?></small>
                    <p><?php echo nl2br(htmlspecialchars($comment['comment_text'])); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-muted">Belum ada komentar.</p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['user_id'])) : ?>
            <h4>Tambahkan Komentar</h4>
            <form action="" method="post" class="comment-form">
                <textarea name="comment" rows="3" placeholder="Tulis komentar Anda..." required></textarea>
                <button type="submit">Kirim Komentar</button>
            </form>
        <?php else : ?>
            <p class="text-danger">Silakan <a href="/login">login</a> untuk berkomentar.</p>
        <?php endif; ?>
    </div>
</div>