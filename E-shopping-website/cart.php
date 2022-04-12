<?php
    ob_start();
// include header.php file
    include('header.php');
?>

<?php

// include cart item if not empty
    count($product->getData('cart')) ? include('Template/_cart-template.php') : include('Template/notFound/_cartNotFound.php') ;
   
// include wishlist item if not empty
    count($product->getData('wishlist')) ? include('Template/_wishlist-template.php') : include('Template/notFound/_wishlistNotFound.php') ;

// include new-phones.php file
    include('Template/_new-phones.php');

// include footer.php file
    include('footer.php');
