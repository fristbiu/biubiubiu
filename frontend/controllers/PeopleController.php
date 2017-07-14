<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 个人信息
 * Date: 2017/7/11
 * Time: 20:52
 */
use Yii;
use frontend\models\Personal;
use frontend\models\PersonalForm;

class PeopleController extends CommonController{
    public $layout='common';
//    个人信息
    public function actionMessage_people(){
    	$user_id=$_SESSION['user_id'];
    	$personal=Personal::find()->where("user_id=$user_id")->asArray()->one();
    	//var_dump($personal);
    	$personal['aa']=1;
    	if(empty($personal)){
    		return $this->render('emptyinfo');
    	}else{
    		$model = new PersonalForm();
        	return $this->render('message_people',['model'=>$model]);
    	}
    }



}