<?php

class Order extends CActiveRecord
{
    public function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return array(
            array('email, phone, shipping', 'required'),
            array('name', 'required', 'on' => 'neworder'),
            array('email, phone, shipping, name', 'length', 'max' => 255),
            array('email', 'email'),
            array('date, quantity, total, user_id, id, status', 'numerical'),
            array('comment', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'comment' => 'Комментарий',
            'date' => 'Время',
            'email' => Yii::t('models.Order', 'label-email'),
            'phone' => Yii::t('models.Order', 'label-phone'),
            'name' => Yii::t('models.Order', 'label-name'),
            'shipping' => Yii::t('models.Order', 'label-shipping'),
            'status' => 'Статус',
            'quantity' => 'Количество товаров',
            'total' => 'Общая стоимость',
            'user_id' => 'Пользователь',
        );
    }

    public function send()
    {
        $text = 'Сумма заказа - ' . $this['total'] . ' грн';
        $text .= '<br/>Телефон - ' . $this['phone'];
        $text .= '<br/>Email - ' . $this['email'];
        if ($this['comment']) {
            $text .= '<br/>Сообщение - ' . $this['comment'];
        }
        $text .= '<br/>Товары:<ul>';
        foreach ($this['product'] as $item) {
            $text .= '<li>' . $item['product_ru'] . ' (' . $item['quantity'] . ' шт, ' . Yii::app()->numberFormatter->formatDecimal($item['total']) . ' грн)</li>';
        }
        $text .= '</ul>';
        $contact = Contact::model()->findByPk(1);
        $mail = new Mail();
        $mail->setTo($contact['email_letter']);
        $mail->setSubject('Новый заказ с сайта ezmedix');
        $mail->setHtml($text);
        $mail->send();
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
                $this['user_id'] = Yii::app()->user->id;
            }
        }
        return true;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_orderproduct = OrderProduct::model()->findAllByAttributes(array('order_id' => $this->primaryKey));
            foreach ($a_orderproduct as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public function relations()
    {
        return array(
            'product' => array(self::HAS_MANY, 'OrderProduct', array('order_id' => 'id')),
            'user' => array(self::HAS_ONE, 'User', array('id' => 'user_id')),
            'orderstatus' => array(self::HAS_ONE, 'OrderStatus', array('id' => 'status')),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('phone', $this['phone'], true);
        $criteria->compare('status', $this['status']);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}