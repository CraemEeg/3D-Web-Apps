<?php
require_once('./Connection.php');
require_once('./Model/ProductModel.php');
require_once('./Controller/MainController.php');

$servername = "unix.sussex.ac.uk";
$username = "im332";
$password = "s4g85d3exunc";
$dbname = "mvc";

$conn = Connection::getInstance($servername, $username, $password, $dbname);

$model = new ProductModel($conn);
$model->dbCreateTable();
$model->dbInsertData();
$controller = new MainController($model);

$controller->index();
