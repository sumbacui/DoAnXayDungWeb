<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Danh sách</small>
                </h1>
                <?php require_once "./mvc/views/pages/alert_message.php" ?>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tiêu đề</th>
                        <th>Thứ tự xuất hiện</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $count = 1; foreach ($data['article'] as $article): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $article['title'] ?></td>
                            <td><?= $article['sort_order'] ?></td>
                            <td>
                                <a href="?url=article/delete/<?= $article['id'] ?>" onclick="return confirm('Bạn có muốn xóa tin tức này ?');"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <a href="?url=article/edit/<?= $article['id'] ?>" style="margin:0 1rem;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php $count++; endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
</div>