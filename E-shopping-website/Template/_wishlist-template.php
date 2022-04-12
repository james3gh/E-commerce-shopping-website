<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['delete_wishlist_submit'])) {
            $deleteRecord = $Cart->deleteCartItem($_POST['item_id'], 'wishlist');
        }

        if (isset($_POST['cart_submit'])) {
            $deleteRecord = $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
        }
    }
?>

<!-- shopping cart  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlist</h5>

        <!-- shopping cart items  -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item) :
                $cart = $product->getProduct($item['item_id']);
                $subTotal[] = array_map(function ($item) {
                    ?>
                <!-- cart item  -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?= $item['item_image']??"./assets/products/1.png" ?>"
                            style="height: 120px;" alt="cart" class="img-fluid">
                    </div>
                    <div class="col sm-8">
                        <h5 class="font-baloo font-size-20"><?= $item['item_name']??"Unknown" ?>
                        </h5>
                        <small>by <?= $item['item_brand']??"Brand" ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">1234 ratings</a>
                        </div>

                        <!-- product qty  -->
                        <div class="qty d-flex pt-2">
                            <form method="POST">
                                <input type="hidden" name="item_id"
                                    value="<?= $item['item_id']??0; ?>">
                                <button type="submit" name="delete_wishlist_submit"
                                    class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="item_id"
                                    value="<?= $item['item_id']??0; ?>">
                                <button name="cart_submit" type="submit" class="btn font-baloo text-danger">Add to
                                    Cart</button>
                            </form>
                        </div>
                        <!-- !product qty  -->
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 font-baloo-text-danger">
                            $<span class="product_price"
                                data-id="<?php echo $item['item_id']??"0"; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>

                </div>
                <!-- !cart item  -->
                <?php
                return $item['item_price'];
                }, $cart);
                    endforeach;
                   
                ?>
            </div>
        </div>
        <!-- !shopping cart items  -->

    </div>
</section>
<!-- !shopping cart  -->