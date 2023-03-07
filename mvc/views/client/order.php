<div class="col-lg-12">
    <small><a href="?url=Home" class="text-dark">Trang chủ</a> <i class="fas fa-angle-double-right"></i> <span
        class="introduce">Đơn hàng của tôi</span></small>
    <div class="heading-lg mt-3">
        <h1>ĐƠN HÀNG CỦA TÔI</h1>
    </div>
</div>
<?php if (count($data['order']) <= 0): ?>
    <div class="container mb-4 mt-4">Hiện tại bạn chưa có đơn hàng nào cả.</div>
<?php else: ?>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['order'] as $item): ?>
                    <?php $text = "Mã đơn hàng: ".$item['id'].", tổng tiền: ".number_format($item['total'],-3,',',',')." VND"; ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <th><?= date('d/m/Y', strtotime($item['created_at'])) ?></th>
                        <td>
                            <?php
                                if($item['status'] == 0){
                                    echo 'Chờ xác nhận';
                                }elseif($item['status'] == 1){
                                    echo 'Xác nhận';
                                }else{
                                    echo 'Hủy';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="?url=home/getOrderDetail/<?= $item['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <?php if($item['status'] == 0): ?>
                                <a href="?url=home/cancleOrder/<?= $item['id'] ?>" class="ml-3" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không ?');"><i class="fas fa-ban"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>