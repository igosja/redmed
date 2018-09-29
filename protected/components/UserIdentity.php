<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $login = User::model()->findByAttributes(array('login' => $this->username, 'status' => 1));
        if ($login === null) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } elseif (!$login->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $login['id'];
            $this->username = $login['login'];
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setLogin($login)
    {
        $this->username = $login;
    }
}