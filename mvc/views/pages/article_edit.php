<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small><?= isset($data['article']['id']) ? 'Cập nhật':'Thêm mới' ?></small>
                </h1>
                <form action="?url=article/update" method="POST" enctype="multipart/form-data">
                    <?php if(isset($data['article']['id'])): ?>
                        <input type="hidden" name="id" value="<?= $data['article']['id'] ?>" />
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="article-title">Tiêu đề:</label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề" id="article-title" name="article-title" value="<?= isset($data['article']['id']) ? $data['article']['title']:'' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Nội dung:</label>
                        <textarea class="form-control" id="description" name="description"><?= isset($data['article']['id']) ? $data['article']['content']:'' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sort-order">Thứ tự hiển thị:</label>
                        <input type="number" class="form-control" placeholder="Nhập thứ tự xuất hiện" id="sort-order" name="sort-order" value="<?= isset($data['article']['id']) ? $data['article']['sort_order']:'' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><?= isset($data['article']['id']) ? 'Cập nhật':'Thêm' ?></button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection