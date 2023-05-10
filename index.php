<?php
require_once('./Connection.php');
require_once('./Model/ProductModel.php');
require_once('./Controller/MainController.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mvc";

$conn = Connection::getInstance($servername, $username, $password, $dbname);
$model = new ProductModel($conn);
$controller = new MainController($model);

$controller->index();
