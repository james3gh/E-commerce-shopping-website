<?php

//require MYSqli Connection
require('../Database/DBController.php');

//require Product class
require('../Database/Product.php');

//DB controller object
$db = new DBController();

// Product Object
$product = new Product($db);


if (isset($_POST['itemid'])) {
    $pro = $product->getProduct($_POST['itemid']);
    echo json_encode($pro);
}
