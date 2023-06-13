<?php

class SellerController
{
    private $model = null;
    private $view = null;

    public function __construct($sellerModel, $sellerView)
    {
        $this->model = $sellerModel;
        $this->view = $sellerView;
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSeller($id);
            $this->view->renderEditSellerForm($one);

        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSeller($id);
            $this->view->renderDeleteSellerForm($one);

        }
    }

    public function details()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSeller($id);
            $this->view->renderSellerDetail($one);

        }
    }

    public function dressForSale()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSellerItemsForSale($id);
            $this->view->renderSellerItemsForSale($one);

        }
    }

    public function dressSold()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSellerItemsSold($id);
            $this->view->renderSellerItemsSold($one);

        }
    }

    public function dressAll()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSellerAllItems($id);
            $this->view->renderSellerAllitems($one);

        }
    }

    public function dressSoldFor()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getSellerSoldFor($id);
            $this->view->renderTotalSoldFor($one);

        }
    }
}