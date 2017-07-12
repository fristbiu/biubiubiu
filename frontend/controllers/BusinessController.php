<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 公司信息
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use backend\models\Profession_type;
class BusinessController extends CommonController
{
//    项目样式
    public $layout = 'common';
//    公司------信息
    public function actionCompanylist(){
        return $this->render('companylist');
    }





}