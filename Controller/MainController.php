<?php

class MainController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = $this->model->getProducts();
        require_once("views/index.php");
    }

    public function coke($index)
    {
        if (isset($_GET['id'])) {
            $product_id = intval($_GET['id']);
            // Perform necessary actions with the product ID.

            $data = $this->model->get3DProductById($product_id);
            require_once("views/drink3D.php");
        }
    }
}
