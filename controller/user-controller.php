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


}