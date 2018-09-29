<?php

class OrderController extends AController
{
    public $h1 = 'Заказы';
    public $h1_edit = 'Редактирование заказа';
    public $title = 'Заказы';
    public $title_index = 'Заказы';
    public $title_update = 'Редактирование заказа';
    public $model_name = 'Order';

    public function actionIndex()
    {
        $model = $this->getModel('search');
        $model->dbCriteria->order = '`id` DESC';
        $model->unsetAttributes();
        if (isset($_GET[$this->model_name])) {
            $model->attributes = $_GET[$this->model_name];
        }
        $this->breadcrumbs = array(
            $this->title => array('index'),
            'Список',
        );
        $this->render('index', array('model' => $model));
    }

    public function actionView($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        $this->h1 = $model['email'];
        $this->breadcrumbs = array(
            $this->title => array('index'),
            $this->h1,
        );
        $this->render('view', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $this->h1 = $this->h1_edit;
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        if ($data = Yii::app()->request->getPost($this->model_name)) {
            $model->attributes = $data;
            if ($model->save()) {
                $this->saveProducts($model->primaryKey);
                Yii::app()->user->setFlash('success', $this->saved);
                $this->redirect(array('view', 'id' => $model->primaryKey));
            }
        }
        $this->breadcrumbs = array(
            $this->title_index => array('index'),
            $this->breadcrumbs[$model['email']] => array('view', 'id' => $model->primaryKey),
            $this->title_update,
        );
        $this->render('form', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = $this->getModel()->findByPk($id);
        if ($model) {
            $model->delete();
        }
        Yii::app()->user->setFlash('success', $this->saved);
        $this->redirect(array('index'));
    }

    public function actionStatus($id)
    {
        $model = $this->getModel()->findByPk($id);
        if (null === $model) {
            throw new CHttpException(404, 'Страница не найдена.');
        }
        $this->getModel()->updateByPk($id, array('status' => (int)Yii::app()->request->getQuery('status')));
    }

    public function saveProducts($order_id)
    {
        $a_product = Yii::app()->request->getPost('Product');
        $exist = array();
        $price = 0;
        $quantity = 0;
        foreach ($a_product as $item) {
            $o_product = Product::model()->findByAttributes(array('id' => $item['product_id']));
            if ($o_product) {
                $o_orderproduct = OrderProduct::model()->findByAttributes(array(
                    'order_id' => $order_id,
                    'product_id' => $item['product_id'],
                ));
                if ($o_orderproduct) {
                    $exist[] = $o_orderproduct->primaryKey;
                    if ($item['quantity'] != $o_orderproduct['quantity']) {
                        $o_orderproduct['quantity'] = $item['quantity'];
                        $o_orderproduct['total'] = round($o_product['price'] * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                        $o_orderproduct->save();
                    }
                    $price = $price + $o_orderproduct['total'];
                    $quantity = $quantity + $o_orderproduct['quantity'];
                } else {
                    $o_orderproduct = new OrderProduct();
                    $o_orderproduct['order_id'] = $order_id;
                    $o_orderproduct['price'] = $o_product['price'];
                    $o_orderproduct['product_id'] = $o_product['id'];
                    $o_orderproduct['product_ru'] = $o_product['h1_ru'];
                    $o_orderproduct['product_uk'] = $o_product['h1_uk'];
                    $o_orderproduct['quantity'] = $item['quantity'];
                    $o_orderproduct['total'] = round($o_product['price'] * (100 - $o_product['discount']) / 100, 2) * $item['quantity'];
                    $o_orderproduct->save();

                    $price = $price + $o_orderproduct['total'];
                    $quantity = $quantity + $item['quantity'];
                }
            }
        }
        $o_order = Order::model()->findByPk($order_id);
        $o_order['quantity'] = $quantity;
        $o_order['total'] = $price;
        $o_order->save();
        OrderProduct::model()->deleteAllByAttributes(array('order_id' => $order_id), array('condition' => 'id NOT IN (' . implode($exist, ',') . ')'));
    }

    /**
     * @param $search string
     * @return CActiveRecord
     */
    public function getModel($search = '')
    {
        $model = new $this->model_name($search);
        return $model;
    }
}