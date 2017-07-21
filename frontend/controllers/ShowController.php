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
use frontend\models\Business;
use frontend\models\Advertise;
class ShowController extends CommonController{
//    项目样式
    public $layout='common';
//    首页
    public function actionIndex(){
    	//处理公司和简历的数据
    	$business=Business::find()->asArray()->all();
    	$advertise=Advertise::find()->limit(20)->asArray()->all();
		//整合数据
    	$newArr=$this->addinfo($business,$advertise);
    	
        return $this->render('index',array('newArr'=>$newArr));
    }

    public function addinfo($business,$advertise)
    {
    	foreach($advertise as &$val){
    		foreach($business as $v){
    			if($val['bussiness_id']==$v['bussiness_id']){
    				$val['bussiness']=$v;
    			}
    		}
    	}
    	return $advertise;
    }







}