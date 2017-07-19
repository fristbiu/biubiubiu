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
//use frontend\models\UploadForm;
use yii\web\UploadedFile;
class PeopleController extends CommonController{
    //用户ID

    public $layout='common';
//    个人信息
    public function actionMessage_people(){
        //查询用户之前是否使用
        $instory_data=Personal::find()->where("user_id=". $_SESSION['user_id'])->one();
        if(!$instory_data){
            $lase_add= new Personal();
            $lase_add->user_id =  $_SESSION['user_id'];
            $lase_add->personal_lastsavetime=date('Y-m-d h-i-s');
            $lase_add->save();
        }
        $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
        $instory_data=Personal::find()->where("user_id=". $_SESSION['user_id'])->one();
        return $this->render('message_people',['instory_data'=>$instory_data,'sort'=>$sort]);
    }
    //个人信息更改
    public function actionPeople_one(){
        //照片表单
        $model = new PersonalForm();
        if(Yii::$app->request->isPost){
            //用照片表单来解决图片上传
            $model->imageFile = UploadedFile::getInstance($model, 'personal_photo');
            //先接收传过来的数据组
            $data = Yii::$app->request->post();
            //如果图片上传成功就把上传成功的路径传给数据组
            $iimg=$model->upload();
            if($iimg!=false){
                $data['PersonalForm']['personal_photo'] = $iimg.$model->imageFile->name;
            }
            //进行数据添加入库
            $add = new Personal();
//            var_dump($data);die;
            //添加数据放到了model参数1：数据组   2：用户ID
            $if_add=$add->table_add($data, $_SESSION['user_id']);
            if($if_add){
                echo "<script>alert('更改成功,点击查看');location.href='index.php?r=people/message_people'</script>";
            }
        }else{
            //搜索历史数据
            $instory = Personal::find()->where(['user_id'=> $_SESSION['user_id']])->asArray()->one();
            $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
            //        file_put_contents($this->xiangmu_url().'.\message.php',json_encode($b));
            return $this->render('people_one',['model'=>$model,'sort'=>$sort,'instory'=>$instory]);
        }
    }




}