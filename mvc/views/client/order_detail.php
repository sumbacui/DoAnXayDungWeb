<div class="col-lg-12">
        <small><a href="?url=home" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <a
            href="?url=home/getOrder/<?= $_SESSION['customer_id'] ?>" class="text-dark">Đơn hàng</a>
        <i class="fas fa-angle-double-right"></i> <span class="introduce">Chi tiết đơn hàng</span></small>
        <div class="heading-lg mt-3">
            <h1>#<?= $data['id'] ?></h1>
        </div>
    </div>
    <div class="container mt-4 mb-4">
        <?php $total = 0; foreach ($data['order'] as $item): ?>
            <?php $total += $item['qty'] * $item['price']; ?>
        <?php endforeach; ?>
        <h4 class="mb-4">Tổng giá trị đơn hàng: <?= number_format($total,-3,',',',') ?> đ</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['order'] as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= number_format($item['price'],-3,',',',') ?> đ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>