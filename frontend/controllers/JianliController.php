<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 简历模块
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use backend\models\Profession_type;
use frontend\models\Personal;
use frontend\models\Resume;
class JianliController extends CommonController
{
//    项目样式
    public $layout = 'common';
    //    我的所有简历
    public function actionJianli_list(){
        //获取固定信息
        $data['type']=array(
           'experience'=>array(0=>'新手',1=>'实习生',2=>'1-2年',3=>'2-3年',4=>'3-4年',5=>'4-5年',6=>'5-6年',7=>'6-7年',8=>'7-8',9=>'9年以上'),
           'process'=>array('小学','初中','高中','大专','本科','研究生','硕士','博士'),
           'married'=>array('单身','热恋','结婚','离婚','丧偶'),
           'dream_money'=>array('5K以下','5K-10K','10K-15K','15K-20K','25K-30K','30K-35K','35K-40K'),
           'firm_size'=>array('10人以下','10-50人','50-100人','150-200人','200-300人','300人以上','500人以上','1千人以上'),
           'stage'=>array('起步阶段','初级阶段','中级阶段','中高级阶段','高级阶段','精通阶段','开发阶段')
        );
        //获取个人信息
        $user_id=$_SESSION['user_id'];
        $userInfo=Personal::find()->where(array('user_id'=>$user_id))->asArray()->one();
        $data['userInfo']=$userInfo;
        $model=new Resume();
        $data['model']=$model;
        return $this->render('jianli_add',$data);
    }

    /**
     * 简历添加提交地址
     * @access public 
     * @param  $_POST
     */
    public function actionJianliadd()
    {
        echo "1";
    }
    

    //   单个简历
    public function actionJianli_one(){
        return $this->render('jianli_one');
    }




}