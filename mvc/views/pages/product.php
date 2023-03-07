<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/pages/alert_message.php" ?>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; foreach ($data['products'] as $product): ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><img src="./uploads/products/<?= $product['image'] ?>" width="60" ></td>
                        <td><?= $product['name']; ?></td>
                        <td><?= number_format($product['price'],-3,',',',') ?> đ</td>
                        <td><?= $product['qty']; ?></td>
                        <td><?= $product['cate_name']; ?></td>
                        <td>
                            <?php if($product['qty'] > 0): ?>
                                <i class="fa fa-check" aria-hidden="true"></i>
                            <?php else: ?>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?url=product/edit/<?= $product['id'] ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=product/delete/<?= $product['id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này không?');"
                               style="margin:0 1rem;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $count++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>