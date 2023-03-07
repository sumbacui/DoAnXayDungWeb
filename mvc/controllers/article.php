<?php

/**
 * Class Article
 */
class Article extends Controller
{
    function execute()
    {
        $model = $this->model('ArticleModel');
        $data = $model->getList();
            $this->view('client',
            [
                'page'          => 'article',
                'title'         => 'Danh sách tin tức',
                'article'       => $data,
                "category"      => $this->getCategory()
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function index()
    {
        $model = $this->model('ArticleModel');
        $data = $model->getList();
        $this->view('index',
            [
                'page'          => 'article',
                'title'         => 'Danh sách tin tức',
                'article'       => $data,
            ]
        );
    }

    /**
     * 
     * @param null $id
     */
    public function edit($id = null)
    {
        $article   = [];

        if ($id) {
            $article = $this->getArticleById($id);
        }

        $title = 'Cập nhật tin tức';
        if (!$id) $title = 'Thêm mới tin tức';

        $this->view("index",
            [
                "page"              => "article_edit",
                "title"             => $title,
                "article"           => $article,
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getArticleById($id)
    {
        $model = $this->model('ArticleModel');
        return $model->getById($id);
    }


    /**
     * @return mixed
     */
    public function update()
    {
       $id   = $_POST['id'] ?: null;
       $title = $_POST['article-title'];
       $content = $_POST['description'];
       $sort_order = $_POST['sort-order'];
       if (!empty($id)) {
            $model = $this->model('ArticleModel');
            $status = $model->update($id,$title,$content,$sort_order);
            if($status){
                $this->addSuccessMessage('Cập nhật bài viết thành công');
                return $this->redirect('?url=article/index');
            }
       }
       $status = $this->insert($title,$content,$sort_order);
       if($status){
            $this->addSuccessMessage('Thêm bài viết thành công');
            return $this->redirect('?url=article/index');
       }
    }

    public function insert($title,$content,$sort_order)
    {
        $model = $this->model('ArticleModel');
        return $model->insert($title,$content,$sort_order);
    }

    function delete($id = null)
    {
        $model = $this->model('ArticleModel');
        $status = $model->deleteById($id);
        if($status){
            $this->addSuccessMessage('Xóa bài viết thành công.');
            return $this->redirect('?url=article/index');
        }
    }

    function chitiet($id)
    {
        $model = $this->model('ArticleModel');
        $data = $model->getById($id);
        $this->view("client",
            [
                "page"              => "article_detail",
                "title"             => $data['title'],
                "article"           => $data,
                "category"          => $this->getCategory()
            ]
        );
    }
}