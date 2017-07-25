<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: 后台首页
 * Date: 2017/7/6
 * Time: 10:28
 */
use yii\web\Controller;
use Yii;
use common\models\jobtype;
class ShowController extends CommonController{
    public $recursion=array();
    public $layout='common';
    /**
     * 首页展示
     * @access public 
     * @return [type] [description]
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 公司列表
     * @access public 
     * @author Ren
     */
    public function actionBussinesslist()
    {
        //获取公司表的数据
        $businessArr=Yii::$app->db->createCommand('SELECT * FROM business')->queryAll();
        return $this->render('businesslist',array('business'=>$businessArr));
    }

    /**
     * ajax修改公司的审核状态
     * @access public 
     * @param  state
     */
    public function actionState()
    {
        //接收数据
        $state=Yii::$app->request->get('state');
        $id=Yii::$app->request->get('id');
        $a='';
        if($state==1){
            $a=0;
        }else{
            $a=1;
        }
        $bloon=Yii::$app->db->createCommand()->update('business',array('business_success'=>$a),"bussiness_id=$id")->execute();
        if($bloon){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * 简历列表
     * @access public
     */
    public function actionJianli()
    {
        echo "22222";
    }
    
}