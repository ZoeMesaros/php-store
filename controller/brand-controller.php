<?php

class BrandController
{
    private $model = null;
    private $view = null;

    public function __construct($brandModel, $brandView)
    {
        $this->model = $brandModel;
        $this->view = $brandView;
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getBrand($id);
            $this->view->renderEditBrandForm($one);

        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getBrand($id);
            $this->view->renderDeleteBrandForm($one);

        }
    }

}