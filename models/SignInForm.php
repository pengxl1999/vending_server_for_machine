<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignInForm extends Model
{
    public $id;
    public $username = '';
    public $user_type;
    public $password = '';
    public $confirmPassword = '';


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username, password and confirmPassword are all required
            [['id', 'user_type', 'username', 'password', 'confirmPassword'], 'required'],
            // password is validated by validatePassword()
            ['username', 'validateUsername'],
            ['confirmPassword', 'validateConfirmPassword'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'=>'id',
            'user_type' => 'ut',
            'username' => '用户名',
            'password' => '密码',
            'confirmPassword' => '确认密码',
        ];
    }


    public function validateUsername($attribute, $params) {
        if(!$this->hasErrors()) {
            if (User::findByUsername($this->username) != null) {
                $this->addError($attribute, '该用户名已存在！');
            }
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateConfirmPassword($attribute, $params)
    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, '用户名或密码错误');
//            }
//        }
        if(!$this->hasErrors()) {
            if($this->password !== $this->confirmPassword) {
                $this->addError($attribute, '密码不匹配！');
            }
        }
    }

    public function signIn()
    {
        $model = new User();
        $this->load(Yii::$app->request->post());
        //print_r($this);
        if($this->username == '' && $this->password == '' && $this->confirmPassword == '') {
            return false;
        }
        if($this->validate()) {
            $model['id'] = $this->id;
            $model['username'] = $this->username;
            $model['user_type'] = $this->user_type;
            $model['password'] = $this->password;
            if($model->save()) return true;
        }
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
        return false;
    }


}
