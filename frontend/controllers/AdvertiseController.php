<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 公司发布招聘信息
 * Date: 2017/7/5
 * Time: 21:12
 */
header("content-type:text/html;charset=utf-8");
use Yii;
use yii\helpers\Url;
use frontend\models\Advertise;
use frontend\models\Jobtype;
class AdvertiseController extends CommonController{
    //    项目样式
    public $layout = 'common';
    public $enableCsrfValidation=false;
    //        公司发布新职位
    public function actionCreate(){
        if(Yii::$app->request->post())
        {
            $data=Yii::$app->request->post();
            $model=new Advertise();
            $model->advertise_name=$data['advertise_name'];
            $model->advertise_type=$data['advertise_type'];
            $model->advertise_process=$data['advertise_process'];
            $model->advertise_ask=$data['advertise_ask'];
            $model->advertise_experience=$data['advertise_experience'];
            $model->advertise_star=$data['advertise_star'];
            $model->advertise_end=$data['advertise_end'];
            $model->advertise_allow=$data['advertise_allow'];
            $model->jobtype_name=$data['jobtype_name'];
            $model->bussiness_id=$data['bussiness_id'];
            $res=$model->save();
            if($res)
            {
                $this->redirect('?r=show/index');
            }
            else
            {
                $this->redirect("?r=advertise/create");
            }
        }
        else
        {
            //查询分类
            $arr=Jobtype::find()->asArray()->all();
            $data=$this->GetTree($arr,$pid=0);
            //print_r($data);die;
            return $this->render('create',['data'=>$data]);
        } 
    }
    public function actionHave_refus(){

        return $this->render('have_refus');
    }
//    发布的职位------发布---下线职位
    public function actionPositions(){
        $arr=Advertise::find()->where(['status'=>1])->asArray()->all();
        $count=count($arr);
        //print_r($arr);die;
        return $this->render('positions',['arr'=>$arr,'count'=>$count]);
    }
    //招聘下线
    public function actionOffline(){
        $id=Yii::$app->request->get('id');
        $arr=Advertise::find()->where(['advertise_id'=>$id])->one();
        $arr->status=0;
        $res=$arr->save();
        if($res)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    //删除招聘信息
    public function actionJob_del(){
        $id=Yii::$app->request->get('id');
        $arr=Advertise::find()->where(['advertise_id'=>$id])->one();
        $res=$arr->delete();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function GetTree($arr,$pid=0)
    {
        //定义数组
        $data=array();
        foreach($arr as $k => $v)
        {
            if($v['parent_id']==$pid)
            {
                $data[$k]=$v;
                $data[$k]['child']=$this->GetTree($arr,$v['jobtype_id']);
            }
        }
        return $data;
    }
}