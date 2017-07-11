<?php
namespace backend\controllers;
/**
 * 后台登录
 * User: 豆俊宇
 * Date: 2017/7/5
 * Time: 14:32
 */

use yii\web\Controller;

class LoginController extends Controller{
    public function actionIndex(){
         return $this->render('login');
    }
}