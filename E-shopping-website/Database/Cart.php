<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            return null;
        }
        $this->db = $db;
    }

    // insert into cart
    public function insertintoCart($params = null, $table='cart')
    {
        if ($this->db->con!=null) {
            if ($params!=null) {
                // get table column
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                // create sql query
                $query_string = "INSERT INTO $table($columns) VALUES ($values)";

                // execute query
                $result = $this->db->con->query($query_string);
            }
        }
    }

    public function addtoCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertintoCart($params);
            if ($result) {
                // relaod page
                header("Location".$_SERVER('PHP_SELF'));
            }
        }
    }

    //calculate subTotal
    public function getSumTotal($arr)
    {
        if (isset($arr)) {
            $sum=0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //delete record from cart
    public function deleteCartItem($item_id=null, $table='cart')
    {
        if ($item_id!=null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header('Location:'.$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //already items in the cart
    public function getCartId($cartArray=null, $key='item_id')
    {
        $cart_id = null;
        if ($cartArray!=null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
        }
        return $cart_id;
    }

    // Save for later
    public function saveForLater($item_id=null, $saveTable='wishlist', $fromTable='cart')
    {
        if ($item_id!=null) {
            $sql = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $sql .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            $result = $this->db->con->multi_query($sql);
            if ($result) {
                header('Location:'.$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}
