<div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                #<?= $data['id'] ?>
            </h1>
            <?php $total = 0; foreach ($data['order'] as $row): ?>
                <?php $total += $row['qty'] * $row['price']; ?>
            <?php endforeach; ?>
            <h4>Tổng giá trị: <?= number_format($total,-3,',',',') ?> đ </h4>
        </div>
        <table class="table table-striped table-bordered table-hover" id="menu-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['order'] as $item): ?>
                <tr class="even gradeC">
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= number_format($item['price'],-3,',',',') ?> đ</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>