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
use frontend\models\Business;
class AdvertiseController extends CommonController{
    //    项目样式
    public $layout = 'common';
    public $enableCsrfValidation=false;
    //        公司发布新职位
    public function actionCreate(){
        if(Yii::$app->request->post())
        {
            $user_id=$_SESSION['user_id'];
            $arr=Business::find()->where(['user_id'=>$user_id])->asArray()->one();
            //print_r($arr);die;
            if($arr['business_success']==1)
            {
                $data=Yii::$app->request->post();
               // print_r($data);die;
                $model=new Advertise();
                $model->advertise_name=$data['advertise_name'];
                $model->advertise_process=$data['advertise_process'];
                $model->advertise_money=$data['advertise_money'];
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
                die('您没有通过后台审核，不能发布招聘');
            }
        }
        else
        {
            if(empty($_SESSION['user_id']))
            {
                echo "<script>alert('请先登录');location.href='?r=login/login'</script>";
            }
            else
            {
                //获取用户id
                $user_id=$_SESSION['user_id'];
                //查询公司id
                $arr=Business::find()->where(['user_id'=>$user_id])->asArray()->one();
                $bussiness_id=$arr['bussiness_id'];
               // echo $bussiness_id;die;
               // 月薪
               $type=array( 
                'money'=>array('5K以下','5K-10K','10K-15K','15K-20K','25K-30K','30K-35K','35K-40K'),
                'experience'=>array('不限','应届毕业生','1年以下','1-3年','3-5年','5-10年','10年以上'),
                'education'=>array('不限','大专','本科','硕士','博士'),
                );
                //查询分类
                $arr=Jobtype::find()->asArray()->all();
                $data=$this->GetTree($arr,$pid=0);
                //print_r($data);die;
                return $this->render('create',['data'=>$data,'bussiness_id'=>$bussiness_id,'type'=>$type]);
            }
        } 
    }
    public function actionHave_refus(){

        return $this->render('have_refus');
    }
//    发布的职位------发布---有效职位
    public function actionPositions(){
        $arr=Advertise::find()->where(['status'=>1])->asArray()->all();
        $count=count($arr);
        //print_r($arr);die;
        return $this->render('positions',['arr'=>$arr,'count'=>$count]);
    }
    //下线职位
    public function actionPositions_off()
    {
        $arr=Advertise::find()->where(['status'=>0])->asArray()->all();
        $count=count($arr);
        //print_r($arr);die;
        return $this->render('positions_off',['arr'=>$arr,'count'=>$count]);
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
    public function actionOnline(){
        $id=Yii::$app->request->get('id');
        $arr=Advertise::find()->where(['advertise_id'=>$id])->one();
        $arr->status=1;
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