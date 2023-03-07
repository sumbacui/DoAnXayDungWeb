<style>
    .post-content{
  background: #f8f8f8;
  border-radius: 4px;
  width: 100%;
  border: 1px solid #f1f2f2;
  margin-bottom: 20px;
  overflow: hidden;
  position: relative;
}

.post-content img.post-image, video.post-video, .google-maps{
  width: 100%;
  height: auto;
}

.post-content .google-maps .map{
  height: 300px;
}

.post-content .post-container{
  padding: 20px;
}

.post-content .post-container .post-detail{
  margin-left: 65px;
  position: relative;
}

.post-content .post-container .post-detail .post-text{
  line-height: 24px;
  margin: 0;
}

.post-content .post-container .post-detail .reaction{
  position: absolute;
  right: 0;
  top: 0;
}

img.profile-photo-md {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

img.profile-photo-sm {
    height: 40px;
    width: 40px;
    border-radius: 50%;
}

.text-green {
    color: #8dc63f;
}

.text-red {
    color: #ef4136;
}
.profile-link{
    color:palevioletred;
}
</style>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="menu-about">
                <div class="heading-lg">
                    <h1 style="font-size:0.8rem;">CHÍNH SÁCH GIAO HÀNG</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Giao hàng TOÀN QUỐC</li>
                    <li class="list-group-item">Thanh toán khi nhận hàng</li>
                    <li class="list-group-item">Đổi trả trong
                        <span class="color-pink">15 ngày</span></li>
                    <li class="list-group-item">Hoàn ngay tiền mặt</li>
                    <li class="list-group-item">Chất lượng đảm bảo</li>
                    <li class="list-group-item">Miễn phí vận chuyển:
                        <span class="color-pink">Đơn hàng từ 3 món trở lên</span></li>
                </ul>
                <div class="heading-lg">
                    <h1 style="font-size:0.8rem;">HƯỚNG DẪN MUA HÀNG</h1>
                </div>
                <ul class="list-group mb-5">
                    <li class="list-group-item">Gọi điện thoại
                        <b class="color-pink">0123456789</b> để mua hàng</li>
                    <li class="list-group-item">Sports
                        <b class="color-pink">TP.HCM</b></li>
                    <li class="list-group-item">Mua hàng số lượng lớn gọi số
                        <b>0123456789</b> để được hỗ trợ</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <small><a href="?url=home" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
                    href="?url=product/detail/<?= $data['product']['id'] ?>" class="text-dark">Sản phẩm</a>
                <i class="fas fa-angle-double-right"></i> <span class="introduce">Chi tiết sản
                    phẩm</span></small>
            <div class="row mt-4 mb-3">
                <div class="col-md-6 sp-large">
                    <a href="?url=product/detail/<?= $data['product']['id'] ?>"><img src="./uploads/products/<?= $data['product']['image'] ?>" alt=""
                            alt=""></a>
                </div>
                <div class="col-md-6 describe">
                    <h4 class="ng-binding"><?= $data['product']['name'] ?></h4>
                    <div class="price">
                        <span class="price-new ng-binding">Giá: <?= number_format($data['product']['price'],-3,',',',') ?> đ</span>
                    </div>
                    <span><b>Số lượng:</b> <?=  $data['product']['qty'] > 0 ? $data['product']['qty'] : 'Hết hàng' ?></span>
                    <div class="row">
                        <div class="col-md-<?= isset($_SESSION['customer_id']) ? 7 : 12 ?>">
                            <form class="add-to-cart" method="POST" action="?url=product/addtocart">
                                <input type="hidden" name="id" value="<?=  $data['product']['id'] ?>" />
                                <input type="hidden" name="name" value="<?= $data['product']['name'] ?>" />
                                <input type="hidden" name="price" value="<?= $data['product']['price'] ?>" />
                                <input type="hidden" name="image" value="<?= $data['product']['image'] ?>" />
                                <?php if(isset($_SESSION['customer_id'])): ?>
                                    <div class="btn-buy mt-4">
                                        <?php if($data['product']['qty'] > 0): ?>
                                            <button type="submit" name="submit" class="btn btn-danger btn-add-to-cart">
                                                <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                        <?php else: ?>
                                            <button type="submit" name="submit" class="btn btn-secondary btn-add-to-cart" disabled>
                                            <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <?php if(!isset($_SESSION['admin_id'])): ?>
                                        <br>
                                        <p>Nhấn vào <a href="?url=home/login">đây</a> để đăng nhập trước khi mua hàng</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-about">
                <div class="heading-lg mb-2">
                    <h1>CHI TIẾT SẢN PHẨM</h1>
                </div>
                <div class="content-describe mb-5 text-justify">
                    <?= html_entity_decode($data['product']['description']) ?>
                </div>
            </div>
        </div>
    </div>
</div>