<?php
namespace frontend\controllers;

/**
 * Created by PhpStorm.
 * User: junyu
 * Date: 2017/7/8
 * Time: 8:05
 */
use yii\web\Controller;
class LoginController extends Controller{

    //    登录
    public function actionLogin(){
        return $this->renderPartial('login');
    }
    public function actionRegister(){
        return $this->renderPartial('register');
    }
}











    


