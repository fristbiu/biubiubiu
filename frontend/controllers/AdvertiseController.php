<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 公司发布招聘信息
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use backend\models\Profession_type;
class AdvertiseController extends CommonController{
    //    项目样式
    public $layout = 'common';
    //        公司发布新职位
    public function actionCreate(){
        return $this->render('create');
    }
    public function actionHave_refus(){
        return $this->render('have_refus');
    }
//    发布的职位------发布---下线职位
    public function actionPositions(){
        return $this->render('positions');
    }
}