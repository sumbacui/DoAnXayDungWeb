<div class="mb-4 mt-4">
    <div style="width:980px;">
        <small><a href="?url=Home" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
                href="?url=article" class="text-dark">Bài viết</a> <i class="fas fa-angle-double-right"></i> <span
                class="introduce"><?= $data['article']['title'] ?></span></small>
        <div class="new-detail-content">
            <h3 class="mt-3">Tiêu đề: <?= $data['article']['title'] ?></h3><small>Đăng lúc: <?= $data['article']['created_at'] ?></small>
            <br><br>
            <div class="new-detail-content-child text-justify">
                <?= html_entity_decode($data['article']['content']) ?>
            </div>
            <br>
        </div>
    </div>
</div>