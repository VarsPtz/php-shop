<?php
/**
 * Created by PhpStorm.
 * User: OTZ_VAV
 * Date: 16.01.2019
 * Time: 12:53
 */

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($good) {
        //        $_SESSION['cart'] += 1;
        if (isset($_SESSION['cart'][$good->id])) {
            $_SESSION['cart'][$good->id]['goodQuantity'] += 1;
        } else {
            $_SESSION['cart'][$good->id] = [
                'goodQuantity' => 1,
                'name' => $good['name'],
                'price' => $good['price'],
                'img' => $good['img'],
            ];
        }

        $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] + 1 : 1;
        $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] + $good->price : $good->price;
    }

    public function recalcCart($id) {
        $quantity = $_SESSION['cart'][$id]['goodQuantity'];
        $price = $_SESSION['cart'][$id]['price'] * $quantity;
        $_SESSION['cart.totalQuantity'] -= $quantity;
        $_SESSION['cart.totalSum'] -= $price;
        unset($_SESSION['cart'][$id]);
    }
}