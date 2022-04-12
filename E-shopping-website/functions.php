<?php

//require MYSqli Connection
require('Database/DBController.php');

//require Product class
require('Database/Product.php');

//require Cart class
require('Database/Cart.php');

//DB controller object
$db = new DBController();

// Product Object
$product = new Product($db);
$product_shuffle = $product->getData();

//cart object
$Cart = new Cart($db);
