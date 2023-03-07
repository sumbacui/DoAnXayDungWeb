<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Người dùng
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/pages/alert_message.php" ?>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['sex'] == 0 ? 'Nam' : 'Nữ' ?></td>
                        <td>
                            <a href="?url=user/delete/<?= $user['id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này không?');">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $count++ ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>