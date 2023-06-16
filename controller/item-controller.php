<?php

class ItemController
{
    private $model = null;
    private $view = null;


    public function __construct($itemModel, $itemView)
    {
        $this->model = $itemModel;
        $this->view = $itemView;
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getItem($id);
            $this->view->renderEditItemForm($one);

        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getItem($id);
            $this->view->renderDeleteItemForm($one);

        }
    }

    public function sell()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getItem($id);
            $this->view->renderItemSellForm($one);

        }
    }
}