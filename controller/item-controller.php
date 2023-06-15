<?php

class ItemController
{
    private $model = null;
    private $view = null;

    private $model2 = null;

    private $model3 = null;

    public function __construct($itemModel, $itemView, $conditionModel, $typeModel)
    {
        $this->model = $itemModel;
        $this->view = $itemView;
        $this->model2 = $conditionModel;
        $this->model3 = $typeModel;

    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getItem($id);
            $con = $this->model2->getAllConditions();
            $type = $this->model3->getAllTypes();
            $this->view->renderEditItemForm($one, $con, $type);

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