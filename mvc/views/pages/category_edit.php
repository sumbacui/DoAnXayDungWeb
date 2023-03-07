<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small><?= isset($data['category']['id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>
                <?php require_once "./mvc/views/pages/alert_message.php" ?>

                <form action="?url=category/update"
                      method="POST"
                      enctype="multipart/form-data"
                      style="margin-bottom:1rem;">

                    <input type="hidden" name="id" value="<?= isset($data['category']['id']) ?$data['category']['id'] : ''; ?>" />
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?= isset($data['category']['id']) ? $data['category']['name'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?= isset($data['category']['id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
