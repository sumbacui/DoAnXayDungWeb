<div class="row mb-4 mt-4">
    <div class="col-lg-9 col-md-12">
        <small><a href="?url=home" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <span
                class="introduce">Tin tức</span></small>
        <div class="heading-lg mt-3 mb-3">
          <h1>TIN TỨC</h1>
        </div>
        <div class="news-content">
            <div classs="news-block">
                <?php if(!empty($data['article'])): ?>
                    <?php foreach ($data['article'] as $article): ?>
                        <div class="news-item">
                            <div class="row">
                                <div class="col-lg-12 title-news">
                                    <div class="d-flex">
                                        <div>
                                            <h4><a class="text-dark" href="?url=article/chitiet/<?= $article['id'] ?>"><?= $article['title'] ?></a></h4>
                                            <small>Đăng lúc <?= $article['created_at'] ?></small>
                                            <p class="text-justify"></p>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <br>
                    <?php endforeach; ?>
                <?php else: ?>
                     <div>Hiện tại chưa có tin tức nào</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>