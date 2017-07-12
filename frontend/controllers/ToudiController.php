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
class ToudiController extends CommonController
{
//    项目样式
    public $layout = 'common';
    //    公司招聘信息简介------点击公司显示公司招聘要求
    public function actionToudi(){
//        return $this->renderPartial('toudi.html');
        return $this->render('toudi');
    }

}