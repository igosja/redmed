<?php

class FeedBack extends CActiveRecord
{
    public function tableName()
    {
        return 'feedback';
    }

    public function rules()
    {
        return array(
            array('email, name, phone, text', 'required'),
            array('date', 'numerical'),
            array('email, name, phone', 'length', 'max' => 255),
            array('email', 'email'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'date' => 'Время',
            'email' => Yii::t('models.Model', 'label-email'),
            'name' => Yii::t('models.Model', 'label-name'),
            'phone' => Yii::t('models.Model', 'label-phone'),
            'status' => 'Статус',
            'text' => Yii::t('models.Model', 'label-text'),
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
            }
        }
        return true;
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function send()
    {
        $text = 'Имя - ' . $this['name'];
        $text .= '<br/>Телефон - ' . $this['phone'];
        $text .= '<br/>Email - ' . $this['email'];
        $text .= '<br/>Сообщение - ' . $this['text'];
        $contact = Contact::model()->findByPk(1);
        $mail = new Mail();
        $mail->setTo($contact['email_letter']);
        $mail->setSubject('Новый вопрос с сайта redmed');
        $mail->setHtml($text);
        $mail->send();
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}