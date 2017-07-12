<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 首页展示
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use backend\models\Profession_type;
class ShowController extends CommonController{
//    项目样式
    public $layout='common';
//    首页
    public function actionIndex(){
    	// $session=Yii::$app->session;
    	// echo $session['user_name'];
    	// echo "3219739128372913";
        return $this->render('index');
    }







}