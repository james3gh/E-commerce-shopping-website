<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['delete_cart_submit'])) {
            $deleteRecord = $Cart->deleteCartItem($_POST['item_id']);
        }

        // save for later
        if (isset($_POST['wishlist_submit'])) {
            $deleteRecord = $Cart->saveForLater($_POST['item_id']);
        }
    }
?>

<!-- shopping cart  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping cart</h5>

        <!-- shopping cart items  -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('cart') as $item) :
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
                            <div class="d-flex font-rale w-25">
                                <button class="btn qty-up bg-light"
                                    data-id="<?php echo $item['item_id']??'0'?>">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                                <input
                                    data-id="<?php echo $item['item_id']??'0'?>"
                                    type="text" class="qty_input border px-2 w-100 bg-light" disabled value="1"
                                    placeholder="1">
                                <button
                                    data-id="<?php echo $item['item_id']??'0'?>"
                                    class="btn qty-down bg-light">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id"
                                    value="<?= $item['item_id']??0; ?>">
                                <button type="submit" name="delete_cart_submit"
                                    class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="item_id"
                                    value="<?= $item['item_id']??0; ?>">
                                <button name="wishlist_submit" type="submit" class="btn font-baloo text-danger">Save for
                                    Later</button>
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

            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is
                        eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal):0 ?>
                            item):&nbsp;
                            <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal)?$Cart->getSumTotal($subTotal):0   ?></span>
                            </span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- !shopping cart items  -->

    </div>
</section>
<!-- !shopping cart  -->