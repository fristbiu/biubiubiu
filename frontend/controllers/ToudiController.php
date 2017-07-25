<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 首页展示
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use db;
use yii\helpers\Url;
use backend\models\Profession_type;
use frontend\models\advertise;
use frontend\models\Business;
use frontend\models\Personal;
use frontend\models\Resume;
class ToudiController extends CommonController
{
//    项目样式
    public $layout = 'common';
    //放csrf攻击
    public $enableCsrfValidation=false;
    //    公司招聘信息简介------点击公司显示公司招聘要求
    public function actionToudi(){
//        return $this->renderPartial('toudi.html');
//        接收公司id
    	$id=Yii::$app->request->get('id');
       //echo $id;die;
        //查询简历信息
        $user_id=$_SESSION['user_id'];
        $personal=Personal::find()->where(['user_id'=>$user_id])->asArray()->one();
        $personal_id=$personal['personal_id'];
        $resume=Resume::find()->where(['personal_id'=>$personal_id])->asArray()->all();
    	//print_r($resume);die;
        //查询招聘信息
    	$arr=Advertise::find()->where(['advertise_id'=>$id])->asArray()->one();
       // print_r($arr);die;
    	$str2=substr(stristr($arr['advertise_ask'],'。'),3);
    	$str1=substr($arr['advertise_ask'],0,strpos($arr['advertise_ask'],'。'));
    	$arr['ask1']=explode('；',$str1);
    	$arr['ask2']=explode('；',$str2);
    	$bid=$arr['bussiness_id'];

    	//查询公司名称
    	$business=Business::find()->where(['bussiness_id'=>$bid])->asArray()->one();
        //print_r($business);die;
        $str=explode(',',$business['business_coordinate']);
        $lng=$str[0];
        $lat=$str[1];
    	// $arr['business_name']=$business['business_name'];
    	// $arr['business_address']=$business['business_address'];
    	//print_r($arr);die;
        return $this->render('toudi',['arr'=>$arr,'business'=>$business,'lng'=>$lng,'lat'=>$lat,'resume'=>$resume]);
    }
    public function actionResume_add()
    {
        $business_id=Yii::$app->request->post('business_id');
        $resume_id=Yii::$app->request->post('resume_id');
        $addtime=date('Y-m-d H:i:s');
       // echo $business_id,$resume_id;die;
        $sql="insert into business_resume set business_id='{$business_id}',resume_id='{$resume_id}',addtime='{$addtime}'";
        $res=Yii::$app->db->createCommand($sql)->execute();
        if($res) {
            return $this->redirect("?r=show/index");
        } else{
            return $this->redirect("?r=show/index");
        }
    }

}