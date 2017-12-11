<?php

class User extends CActiveRecord
{
    public $password_new;

    public function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return array(
            array('address, email, name, phone', 'required', 'on' => 'edit'),
            array('login, password', 'required', 'on' => 'login'),
            array('address, email, name, phone', 'required', 'on' => 'signup'),
            array('address, email, login, name, phone, password_new', 'length', 'max' => 255),
            array('email', 'email'),
            array('email', 'unique'),
            array('date, status, userrole_id, usertype_id', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'address' => Yii::t('models.Model', 'label-address'),
            'date' => 'Дата регистрации',
            'email' => 'E-mail',
            'login' => Yii::t('models.Model', 'label-login'),
            'name' => Yii::t('models.Model', 'label-name'),
            'password' => Yii::t('models.Model', 'label-password'),
            'password_new' => 'Пароль',
            'phone' => Yii::t('models.Model', 'label-phone'),
            'status' => 'Статус',
            'userrole_id' => 'Роль в системе',
            'usertype_id' => 'Тип пользователя',
        );
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this['date'] = time();
            }
            if ($this->password_new) {
                $this['password'] = $this->hashPassword($this->password_new);
            }
        }
        return true;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $a_userimage = UserImage::model()->findAllByAttributes(array('user_id' => $this->primaryKey));
            foreach ($a_userimage as $item) {
                $item->delete();
            }
        }
        return true;
    }

    public function validatePassword($password)
    {
        return md5($password . md5('user-salt')) == $this['password'];
    }

    public function hashPassword($password)
    {
        return md5($password . md5('user-salt'));
    }

    public function send()
    {
        $text = 'Имя - ' . $this['name'];
        $text .= '<br/>Телефон - ' . $this['phone'];
        $text .= '<br/>Email - ' . $this['email'];
        $contact = Contact::model()->findByPk(1);
        $mail = new Mail();
        $mail->setTo($contact['email_letter']);
        $mail->setSubject('Новая регистриция на сайте ezmedix');
        $mail->setHtml($text);
        $mail->send();
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this['id']);
        $criteria->compare('login', $this['login'], true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function relations()
    {
        return array(
            'image' => array(self::HAS_MANY, 'UserImage', array('user_id' => 'id')),
            'userrole' => array(self::HAS_ONE, 'UserRole', array('id' => 'userrole_id')),
            'usertype' => array(self::HAS_ONE, 'UserType', array('id' => 'usertype_id')),
        );
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}