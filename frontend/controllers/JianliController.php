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
    public function actionJianli_add(){
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
     * 删除简历（ajax）
     * @access public 
     * @param  resume_id
     */
    public function actionDel()
    {
        //接收数据
        $resume_id=Yii::$app->request->get('resume_id');
        $resume=Resume::findOne($resume_id);
        $bloon=$resume->delete();
        if($bloon){
            echo 1;
        }else{
            echo 0;
        }
        //echo $resume_id;
    }

    /**
     * 简历添加提交地址
     * @access public 
     * @param  $_POST
     */
    public function actionJianli_addact()
    {
        //接收数据
        $data=$_POST;
        if(isset($data['resume_id'])){
            $resume=Resume::findOne($data['resume_id']);
        }else{
            $resume=new Resume();
        }
        $resume->resume_name=$data['resume_name'];
        $resume->resume_qq=$data['resume_qq'];
        $resume->resume_tel=$data['resume_tel'];
        $resume->resume_age=$data['resume_age'];
        $resume->resume_process=$data['resume_process'];
        $resume->resume_experience=$data['resume_experience'];
        $resume->resume_historywork=$data['resume_historywork'];
        $resume->resume_dreamework=$data['resume_dreamework'];
        $resume->resume_workaddress=$data['resume_workaddress'];
        $resume->personal_id=$data['personal_id'];
        $bloon=$resume->save();
        if($bloon){
            $this->redirect('?r=jianli/jianli_list');
        }else{
            echo "简历添加失败！";
        }
    }
    
    /**
     * 建立的列表
     * @access public 
     * @param 
     */
    public function actionJianli_list()
    {
        if(!isset($_SESSION['user_id'])){
            echo "<script>alert('此功能需要先登录！');location.href='?r=login/login'</script>";
            die;
        }
        //获取个人信息
        $user_id=$_SESSION['user_id'];
        $userInfo=Personal::find()->where(array('user_id'=>$user_id))->asArray()->one();
        $personal_id=$userInfo['personal_id'];
        //获取数据
        $resumeArr=Resume::find()->where(array('personal_id'=>$personal_id))->asArray()->all();
        // echo "<pre>";
        // print_r($resumeArr);die;
        return $this->render('jianli_list',array('resumeArr'=>$resumeArr));
    }

    /**
     * 单个简历的编辑
     * @access public
     * @param  resume_id
     */
    public function actionEdit()
    {
        if(Yii::$app->request->post()){
            //接收数据
            $data=Yii::$app->request->post();
            echo "<pre>";
            print_r($data);
        }else{
            $type=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
            $resume_id=Yii::$app->request->get('resume_id');
            //获取个人信息
            $user_id=$_SESSION['user_id'];
            $userInfo=Personal::find()->where(array('user_id'=>$user_id))->asArray()->one();
            //获取数据
            $resumeArr=Resume::find()->where(array('resume_id'=>$resume_id))->asArray()->one();
            //查询工作类型表
            $sql="select * from jobtype";
            $jobArr=Yii::$app->db->createCommand($sql)->queryAll();
            $new=$this->addinfo($jobArr,$userInfo);
            
            $data['userInfo']=$new;
            $data['resumeArr']=$resumeArr;
            $data['type']=$type;
            $model=new Resume();
            $data['model']=$model;
            return $this->render('jianli_edit',$data);
        }
    }


    /**
     * 单个简历展示
     * @access public
     */
    public function actionJianli_one()
    {
        $type=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
        $resume_id=Yii::$app->request->get('resume_id');
        //获取个人信息
        $user_id=$_SESSION['user_id'];
        $userInfo=Personal::find()->where(array('user_id'=>$user_id))->asArray()->one();
        //获取数据
        $resumeArr=Resume::find()->where(array('resume_id'=>$resume_id))->asArray()->one();
        //查询工作类型表
        $sql="select * from jobtype";
        $jobArr=Yii::$app->db->createCommand($sql)->queryAll();
        $new=$this->addinfo($jobArr,$userInfo);
        
        $data['userInfo']=$new;
        $data['resumeArr']=$resumeArr;
        $data['type']=$type;
        return $this->render('jianli_one',$data);
    }

    /**
     * 处理将数据加入数组
     * @access public
     */
    public function addinfo($jobArr,$userInfo)
    {
        foreach($jobArr as $val){
            if($userInfo['personal_dreamwork']==$val['jobtype_id']){
                $userInfo['dreamwork']=$val['jobtype_name'];
            }
        }
        return $userInfo;
    }



}