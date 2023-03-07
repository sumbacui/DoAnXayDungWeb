<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small><?= isset($data['product']['id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>
                <?php require_once "./mvc/views/pages/alert_message.php" ?>

                <form action="?url=product/update"
                      method="POST"
                      enctype="multipart/form-data"
                      style="margin-bottom:1rem;">

                    <input type="hidden" name="id" value="<?= isset($data['product']['id']) ? $data['product']['id'] : ''; ?>" />
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?= isset($data['product']['id']) ? $data['product']['name'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả sản phẩm</label>
                        <textarea name="description"
                                  id="description"
                                  rows="6"
                                  class="form-control"><?= isset($data['product']['id']) ? $data['product']['description'] : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá bán</label>
                        <input type="number"
                               class="form-control"
                               id="price"
                               name="price"
                               min=1
                               value="<?= isset($data['product']['id']) ? $data['product']['price'] : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="qty">Số lượng</label>
                        <input type="number"
                               class="form-control"
                               id="qty"
                               value="<?= isset($data['product']['id']) ? $data['product']['qty'] : ''; ?>"
                               name="qty"
                               min=1
                               required>
                    </div>

                    <div class="form-group">
                        <label for="category" >Danh mục sản phẩm</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Vui lòng chọn danh mục sản phẩm</option>
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?= $category['id']; ?>" <?= isset($data['product']['category_id']) && $data['product']['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                                    <?= $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Ảnh sản phẩm</label>
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
                    </div>
                    <?php if(isset($data['product']['id'])): ?>
                        <img src="./uploads/products/<?= $data['product']['image'] ?>" width="80" height="80" /> <br />
                    <?php endif; ?>
                    <br><br>
                    <button type="submit" class="btn btn-primary">
                        <?= isset($data['product']['id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
