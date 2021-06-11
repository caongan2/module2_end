<?php
include "vendor/autoload.php";

use Controller\ProductController;

$controller = new ProductController();
$page = $_REQUEST['page'] ?? null;
switch ($page) {
    case "add":
        $controller->add();
        break;
    case "list":
        $controller->getAll();
        break;
    case "delete":
        $controller->delete();
        break;
}
