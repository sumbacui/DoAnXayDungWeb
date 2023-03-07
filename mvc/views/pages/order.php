<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã đơn hàng</th>
                        <th>Người thanh toán</th>
                        <th>Tổng tiền</th>
                        <th>Thời gian thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data["order"] as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= number_format($row['total'],-3,',',',') ?> đ</td>
                            <td><?= date('d-m-Y H:i:s',strtotime($row['created_at'])) ?></td>
                            <td>
                                <?php if ($row['status'] == 0): ?>
                                    Chờ xác nhận
                                <?php elseif ($row['status'] == 1): ?>
                                    Xác nhận
                                <?php elseif ($row['status'] == 2): ?>
                                    Hủy
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Hành động
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="max-width:140px !important;">
                                        <li><a href="?url=order/detail_admin/<?= $row['id'] ?>">Xem chi tiết</a></li>
                                        <?php if($row['status'] == 0): ?>
                                            <li><a href="?url=order/accept/<?= $row['id'] ?>">Xác nhận đơn hàng</a></li>
                                            <li><a href="?url=order/cancle/<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này ?');">Hủy đơn hàng</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>