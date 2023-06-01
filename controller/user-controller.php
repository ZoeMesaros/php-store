<?php

class UserController
{
    private $model = null;
    private $view = null;

    public function __construct($userModel, $userView)
    {
        $this->model = $userModel;
        $this->view = $userView;
    }

    public function start()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUser($id);
            $this->view->renderEditUserForm($one);

        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUser($id);
            $this->view->renderDeleteUserForm($one);

        }
    }

    public function details()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUser($id);
            $this->view->renderUserDetail($one);

        }
    }

    public function dressForSale()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUserItemsForSale($id);
            $this->view->renderUserItemsForSale($one);

        }
    }

    public function dressSold()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUserItemsSold($id);
            $this->view->renderUserItemsSold($one);

        }
    }

    public function dressAll()
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $one = $this->model->getUserAllItems($id);
            $this->view->renderUserAllitems($one);

        }
    }
}