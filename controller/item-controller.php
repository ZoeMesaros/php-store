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

    public function sellItem()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getItemWithBrandAndUsername($id);
            $this->view->renderItemSellForm($one);

        }
    }


}