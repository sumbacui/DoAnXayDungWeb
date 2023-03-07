<div class="row banner-container">
    <div class="col-lg-12">
        <div id="banner" class="carousel slide mt-4 mb-4" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./public/assets/img/slides/slide1.png">
                </div>
                <div class="carousel-item">
                    <img src="./public/assets/img/slides/slide2.png">
                </div>
                <div class="carousel-item">
                    <img src="./public/assets/img/slides/slide3.png">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#banner" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#banner" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>
<h4>Sản phẩm</h4>
<div class="row mb-4" id="product-container">
    <?php foreach ($data['product'] as $product): ?>
        <div class="col-lg-3 mb-4">
            <div class="product-item-box">
                <div class="product-item">
                    <div class="image">
                        <a href="?url=product/detail/<?= $product['id'] ?>">
                            <img src="./uploads/products/<?= $product['image'] ?>" width="100%" height="100%" name="product-image" class="product-image" />
                        </a>
                        <a href="?url=product/detail/<?= $product['id'] ?>" class="more-info"><i class="fas fa-search"></i> XEM THÊM</a>
                    </div>
                    <a href="?url=product/detail/<?= $product['id'] ?>" class="product-name mt-4"><?= $product['name'] ?></a>
                    <div class="price-new" name="price-new"><?= number_format($product['price'],-3,',',',') ?> đ</div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<ul class="pagination">
    <?php if($data['current_page'] > 1): ?>
        <li class="page-item"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $data['current_page'] - 1 ?>">Trước</a></li>
    <?php else: ?>
        <li class="page-item disabled"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $data['current_page'] - 1 ?>">Trước</a></li>
    <?php endif; ?>
    <?php for($num = 1;$num <= $data['total'];$num++): ?>
        <?php if($num != $data['current_page']): ?>
            <li class="page-item"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $num ?>"><?= $num ?></a></li>
        <?php else: ?>
            <li class="page-item active"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $num ?>"><?= $num ?></a></li>
        <?php endif;?>
    <?php endfor; ?>
    <?php if($data['current_page'] != $data['total']): ?>
        <li class="page-item"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $data['current_page'] + 1 ?>">Sau</a></li>
    <?php else: ?>
        <li class="page-item disabled"><a class="page-link" href="?url=home&per_page=<?= $data['item_per_page'] ?>&page=<?= $data['current_page'] + 1 ?>">Sau</a></li>
    <?php endif; ?>
</ul>
<div class="row mb-4">
    <div class="col-lg-3">
        <div class="sale-policy-block">
            <i class="fas fa-sync-alt"></i> HOÀN TRẢ TRONG VÒNG 30 NGÀY
        </div>
    </div>
    <div class="col-lg-3">
        <div class="sale-policy-block">
            <i class="fas fa-truck"></i> GIAO HÀNG MIỄN PHÍ
        </div>
    </div>
    <div class="col-lg-3">
        <div class="sale-policy-block">
            <i class="fas fa-shopping-basket"></i> THANH TOÁN LINH HOẠT
        </div>
    </div>
    <div class="col-lg-3">
        <div class="sale-policy-block">
            <i class="fas fa-users"></i> HỖ TRỢ KHÁCH HÀNG
        </div>
    </div>
</div>