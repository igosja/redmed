<?php

//\usr\local\php5\php.exe www\protected\yiic migrate

class Controller extends CController
{
    public $a_category = array();
    public $a_language = array();
    public $a_social = array();
    public $breadcrumbs = array();
    public $count_cart;
    public $count_delivery = 0;
    public $forget;
    public $layout = 'main';
    public $o_contact;
    public $og_image;
    public $order;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $searchInfo;

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'deny',
                'actions' => array('login'),
                'users' => array('@'),
                'deniedCallback' => function () {
                    $this->redirect(array('index/index'));
                },
            ),
        );
    }

    public function init()
    {
        $this->a_language = Language::model()->findAllByAttributes(
            array('status' => 1),
            array('select' => array('code', 'name'), 'order' => '`order` ASC')
        );
        if ($language = Yii::app()->request->getQuery('language')) {
            Yii::app()->language = $language;
        } else {
            $language = Language::model()->findByAttributes(array('status' => 1), array('select' => array('code'), 'order' => '`order` ASC'));
            Yii::app()->language = $language['code'];
        }
        $this->a_category = Category::model()->findAllByAttributes(
            array('status' => 1), array('order' => '`order` ASC')
        );
        $this->a_social = Social::model()->findAllByAttributes(
            array('status' => 1), array('order' => '`order` ASC')
        );
        $this->forget = new Forget();
        $this->o_contact = Contact::model()->findByPk(1);
        $this->order = new Order();
        $this->order->setScenario('neworder');
        $this->searchInfo = new SearchInfo();
        $clientScript = Yii::app()->getClientScript();
        $clientScript->scriptMap = array(
            'jquery.js' => false,
        );
    }

    public function beforeAction($action)
    {
        if ($language = Yii::app()->request->getPost('language')) {
            Yii::app()->language = $language;
            $redirect = array($this->uniqueId . '/' . $this->action->id);
            if (Yii::app()->request->getQuery('id')) {
                $redirect['id'] = Yii::app()->request->getQuery('id');
            }
            $this->redirect($redirect);
        }

        $model = new Forget();
        if ($data = Yii::app()->request->getPost('Forget')) {
            $model->attributes = $data;
            if ($model->validate() && $model->check()) {
                $model->send();
                Yii::app()->user->setFlash('success-forget', true);
                $this->refresh();
            } else {
                Yii::app()->user->setFlash('error-forget', true);
            }
        }

        $model = new Order();
        $model->setScenario('neworder');
        $count = 0;
        $price = 0;
        $o_user = User::model()->findByPk(Yii::app()->user->id);
        $model['email'] = $o_user['email'];
        $model['phone'] = $o_user['phone'];
        if (!Yii::app()->user->isGuest) {
            $a_cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
            $this->count_cart = Cart::model()->countByAttributes(array('user_id' => Yii::app()->user->id));
            $this->count_delivery = Order::model()->countByAttributes(array('user_id' => Yii::app()->user->id, 'status' => 1));
        } else {
            $a_cart = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->getSession()->getSessionId()));
            $this->count_cart = Cart::model()->countByAttributes(array('session_id' => Yii::app()->getSession()->getSessionId()));
        }
        foreach ($a_cart as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
            if ($o_product) {
                $count = $count + $item['quantity'];
                $price = $price + round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
            } else {
                Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
            }
        }
        if ($count && $data = Yii::app()->request->getPost('Order')) {
            $model->attributes = $data;
            if ($model->validate()) {
                if (Yii::app()->user->isGuest) {
                    $o_user = User::model()->findByAttributes(array('email' => $model->email));
                    if ($o_user) {
                        $identity = new UserIdentity($o_user['login'], $o_user['password']);
                        $identity->setId($o_user->id);
                        $identity->setLogin($o_user['login']);
                        $identity->errorCode=UserIdentity::ERROR_NONE;
                        Yii::app()->user->login($identity);
                    } else {
                        $o_user = new User;
                        $o_user->setScenario('signup');
                        $o_user->name = $model->name;
                        $o_user->phone = $model->phone;
                        $o_user->usertype = 'order';
                        $o_user->email = $model->email;
                        $o_user->address = 'order';
                        if ($o_user->save()) {
                            $o_user->send();
                        }
                        $identity = new UserIdentity($o_user['login'], $o_user['password']);
                        $identity->setId($o_user->id);
                        $identity->setLogin($o_user['login']);
                        $identity->errorCode=UserIdentity::ERROR_NONE;
                        Yii::app()->user->login($identity);
                    }
                    Cart::model()->updateAll(
                        array('user_id' => $o_user['id']),
                        array('condition' => 'session_id="' . Yii::app()->getSession()->getSessionId() . '"')
                    );
                }
            }
            if ($model->save()) {
                $price = 0;
                $quantity = 0;
                foreach ($a_cart as $item) {
                    $o_product = Product::model()->findByAttributes(array('id' => $item['product_id'], 'status' => 1));
                    if ($o_product) {
                        $o_orderproduct = new OrderProduct();
                        $o_orderproduct['order_id'] = $model['id'];
                        $o_orderproduct['price'] = $o_product->getPrice();
                        $o_orderproduct['product_id'] = $o_product['id'];
                        $o_orderproduct['product_ru'] = $o_product['h1_ru'];
                        $o_orderproduct['product_uk'] = $o_product['h1_uk'];
                        $o_orderproduct['quantity'] = $item['quantity'];
                        $o_orderproduct['total'] = round($o_product->getPrice() * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                        $o_orderproduct->save();

                        $price = $price + $o_orderproduct['total'];
                        $quantity = $quantity + $item['quantity'];
                    } else {
                        Cart::model()->deleteAllByAttributes(array('product_id' => $item['product_id']));
                    }
                }
                $model['quantity'] = $quantity;
                $model['total'] = $price;
                $model->save();
                $model->send();;
                Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->id));
                Yii::app()->user->setFlash('success-order', true);
                $this->redirect(array('profile/order'));
            }
        }
        $this->order = $model;
        $main = PageMain::model()->findByPk(1);
        if ($main['rate_date'] < time()-86400) {
            $json = json_decode(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json&valcode=USD'), true);
            $rate = $json[0]['rate'];
            $main->rate_usd = $rate;

            $json = json_decode(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json&valcode=EUR'), true);
            $rate = $json[0]['rate'];
            $main->rate_eur = $rate;

            $json = json_decode(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json&valcode=PLN'), true);
            $rate = $json[0]['rate'];
            $main->rate_pln = $rate;

            $json = json_decode(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json&valcode=CNY'), true);
            $rate = $json[0]['rate'];
            $main->rate_cny = $rate;

            $main->rate_date = strtotime(date('Y-m-d 00:00:00'));
            $main->save();
        }
        return $action;
    }

    public function setSEO($model)
    {
        if ($model['seo_title_' . Yii::app()->language]) {
            $this->seo_title = $model['seo_title_' . Yii::app()->language];
        } else {
            $this->seo_title = $model['h1_' . Yii::app()->language];
        }
        if ($model['seo_description_' . Yii::app()->language]) {
            $this->seo_description = $model['seo_description_' . Yii::app()->language];
        }
        if ($model['seo_keywords_' . Yii::app()->language]) {
            $this->seo_keywords = $model['seo_keywords_' . Yii::app()->language];
        }
    }
}
