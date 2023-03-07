<?php

/**
 * Class Category
 */
class Category extends Controller
{
    public function __construct()
    {
        if ($_SESSION['role'] == 0) {
            return $this->redirect('?url=home/login');
        }
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('index',
            [
                'page'          => 'category',
                'title'         => 'Quản lý danh mục sản phẩm',
                'categories'      => $this->getList()
            ]
        );
    }

    /**
     * @param null $id
     */
    public function edit($id = null)
    {
        $data = [];
        if ($id) {
            $data = $this->getById($id);
        }

        $this->view('index',
            [
                'page'          => 'category_edit',
                'title'         => 'Tạo mới danh mục sản phẩm',
                'category'      => $data
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $model = $this->model('CategoryModel');
        return $model->getById($id);
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        $model = $this->model('CategoryModel');
        return $model->getList();
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại.');
            return $this->redirect('?url=category');
        }

        try {
            $model = $this->model('CategoryModel');
            $model->deleteById($id);
            $this->addSuccessMessage('Xóa danh mục thành công.');
        } catch (\Exception $e) {
            $this->addErrorMessage($e->getMessage());
        }

        return $this->redirect('?url=category');
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id         = $_POST['id'] ?: null;
        $name       = $_POST['name'] ?: '';

        try {
            $model = $this->model('CategoryModel');
            if ($id) {
                $info = $model->update($id, $name);
                if ($info) {
                    $this->addSuccessMessage('Cập nhật danh mục thành công.');
                } else {
                    $this->addErrorMessage('Đã có lỗi xảy ra khi cập nhật thông tin danh mục.');
                }
            } else {
                $hhId = $model->insert($name);
                if ($hhId) {
                    $this->addSuccessMessage('Tạo mới danh mục thành công.');
                } else {
                    $this->addErrorMessage('Đã có lỗi xảy ra khi tạo mới thông tin danh mục.');
                }
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=category');
    }
}