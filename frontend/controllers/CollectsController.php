<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 收藏
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;

class CollectsController extends CommonController
{
//    项目样式
    public $layout = 'common';

    //    收藏
    public function actionCollects(){

        return $this->render('collects');
    }
}