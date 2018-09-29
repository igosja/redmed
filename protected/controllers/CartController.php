<?php

class CartController extends Controller
{
    public function actionAdd()
    {
        $product_id = (int)Yii::app()->request->getQuery('product_id', 0);
        $quantity = (int)Yii::app()->request->getQuery('quantity', 0);
        if ($product_id && $quantity) {
            $o_cart = Cart::model()->findByAttributes(
                array('user_id' => Yii::app()->user->id, 'product_id' => $product_id)
            );
            if ($o_cart) {
                $o_cart->delete();
            } else {
                $o_cart = new Cart();
                $o_cart['product_id'] = $product_id;
                $o_cart['quantity'] = $quantity;
                $o_cart->save();
            }
        }
        $price = 0;
        $count = 0;
        $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                $price = $price + round($o_product['price'] * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                $count = $count + $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        print CJSON::encode(array(
            'status' => 'success',
            'count' => $count,
            'price' => Yii::app()->numberFormatter->formatDecimal($price),
        ));
    }

    public function actionAddonpage()
    {
        Yii::app()->language = Yii::app()->request->getQuery('language', 'uk');
        Cart::model()->deleteAllByAttributes(array('user_id' => 0), 'date<' . (time()-86400));
        $product_id = (int)Yii::app()->request->getQuery('product_id', 0);
        $quantity = (int)Yii::app()->request->getQuery('quantity', 0);
        if ($product_id && $quantity) {
            if (Yii::app()->user->isGuest) {
                $o_cart = Cart::model()->findByAttributes(
                    array('session_id' => Yii::app()->getSession()->getSessionId(), 'product_id' => $product_id)
                );
            } else {
                $o_cart = Cart::model()->findByAttributes(
                    array('user_id' => Yii::app()->user->id, 'product_id' => $product_id)
                );
            }
            if ($o_cart) {
                $o_cart['quantity'] = $o_cart['quantity'] + $quantity;
                $o_cart->save();
            } else {
                $o_cart = new Cart();
                $o_cart['product_id'] = $product_id;
                $o_cart['quantity'] = $quantity;
                if (Yii::app()->user->isGuest) {
                    $o_cart['session_id'] = Yii::app()->getSession()->getSessionId();
                } else {
                    $o_cart['user_id'] = Yii::app()->user->id;
                }
                $o_cart->save();
            }
        }
        $price = 0;
        $list = '';
        $count = 0;
        if (Yii::app()->user->isGuest) {
            $a_cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->getSession()->getSessionId()));
        } else {
            $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        }
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                $product_price = round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                $price = $price + $product_price;
                $list .=
                    '<div class="form-buy__item clearfix">
                        <a href="javascript:;" class="form-buy__item__del" data-product="' . $item['product_id'] . '"></a>'
                        . CHtml::link(
                            $o_product['h1_' . Yii::app()->language],
                            array('product/view', 'id' => $o_product['url']),
                            array('class' => 'form-buy__text')
                        )
                    . '
                        <div class="clearfix">
                            <div class="total clearfix">
                                <a href="javascript:" class="total__minus on-page-plus" data-product="' . $item['product_id'] . '"></a>
                                <input
                                    type="text"
                                    class="total__input score on-page-quantity"
                                    value="' . $item['quantity'] . '"
                                    data-product="' . $item['product_id'] . '"
                                />
                                <a href="javascript:" class="total__plus on-page-minus" data-product="' . $item['product_id'] . '"></a>
                            </div> 
                            <div class="form-buy__price cart-price-div-' . $item['product_id'] . '">' . Yii::app()->numberFormatter->formatDecimal($product_price) . ' грн.</div>
                        </div>
                    </div>';
                $count = $count + $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        print CJSON::encode(array(
            'status' => 'success',
            'count' => $count,
            'list' => $list,
            'price' => '<span>Сума:</span> ' . Yii::app()->numberFormatter->formatDecimal($price) . ' грн',
        ));
    }

    public function actionChange()
    {
        $product_id = (int)Yii::app()->request->getQuery('product_id', 0);
        $quantity = (int)Yii::app()->request->getQuery('quantity', 0);
        if ($product_id) {
            if ($quantity) {
                if (Yii::app()->user->isGuest) {
                    $o_cart = Cart::model()->findByAttributes(
                        array('session_id' => Yii::app()->getSession()->getSessionId(), 'product_id' => $product_id)
                    );
                } else {
                    $o_cart = Cart::model()->findByAttributes(
                        array('user_id' => Yii::app()->user->id, 'product_id' => $product_id)
                    );
                }
                if ($o_cart) {
                    $o_cart['quantity'] = $quantity;
                    $o_cart->save();
                }
            } else {
                if (Yii::app()->user->isGuest) {
                    Cart::model()->deleteAllByAttributes(array('session_id' => Yii::app()->getSession()->getSessionId(), 'product_id' => $product_id));
                } else {
                    Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->id, 'product_id' => $product_id));
                }
            }
        }
        $price = 0;
        $product_price = 0;
        if (Yii::app()->user->isGuest) {
            $a_cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->getSession()->getSessionId()));
        } else {
            $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        }
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                if ($product_id == $item['product_id']) {
                    $product_price = round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                }
                $price = $price + round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        print CJSON::encode(array(
            'status' => 'success',
            'product_id' => $product_id,
            'product_price' => Yii::app()->numberFormatter->formatDecimal($product_price),
            'price' => '<span>Сума:</span> ' . Yii::app()->numberFormatter->formatDecimal($price) . ' грн',
        ));
    }
}
