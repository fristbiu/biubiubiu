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
use frontend\models\advertise;
use frontend\models\Business;
class ToudiController extends CommonController
{
//    项目样式
    public $layout = 'common';
    //    公司招聘信息简介------点击公司显示公司招聘要求
    public function actionToudi(){
//        return $this->renderPartial('toudi.html');
//        接收id
    	$id=Yii::$app->request->get('id');
    	//查询招聘信息
    	$arr=Advertise::find()->where(['advertise_id'=>$id])->asArray()->one();
    	$str2=substr(stristr($arr['advertise_ask'],'。'),3);
    	$str1=substr($arr['advertise_ask'],0,strpos($arr['advertise_ask'],'。'));
    	$arr['ask1']=explode('；',$str1);
    	$arr['ask2']=explode('；',$str2);
    	$bid=$arr['bussiness_id'];
    	//查询公司名称
    	$business=Business::find()->where(['bussiness_id'=>$bid])->asArray()->one();
    	$arr['business_name']=$business['business_name'];
    	$arr['business_address']=$business['business_address'];
    	//print_r($arr);die;
        return $this->render('toudi',['arr'=>$arr]);
    }

}