<div class="container mt-3 mb-3">
    <div class="row mb-4">
        <div class="col-lg-3 col-md-12">
            <div class="menu-news">
                <h5 class="new-title">Tìm kiếm với từ khóa <?= $data['q'] ?></h5>
                <ul>
                <?php foreach ($data['category'] as $category): ?>
                        <li><i class="fas fa-arrow-circle-right"></i> <a href="?url=product/category/<?= $category['id'] ?>"><?= $category['name']  ?></a></li>
                        <hr />
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="row ml-4">
                <?php if (count($data['product']) > 0): ?>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>