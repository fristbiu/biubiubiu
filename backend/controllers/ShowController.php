<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: 后台首页
 * Date: 2017/7/6
 * Time: 10:28
 */
use yii\web\Controller;
class ShowController extends Controller{
    public function actionIndex(){
        return $this->renderPartial('index.html');
    }
}