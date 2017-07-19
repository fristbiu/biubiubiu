<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 公司信息
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use frontend\models\BusinessForm;
use yii\web\UploadedFile;
use frontend\models\Business;
class BusinessController extends CommonController
{
//    项目样式
    public $layout = 'common';
//    公司------信息
    public function actionCompanylist(){
        $model= new Business();
        //根据ID进行查询数据
        $data=$model->find()->where(['user_id'=>$_SESSION['user_id']])->one();
        //如果库中没有数据就添加一条user_id为用户ID的数据
        if(empty($data)){
                $model->business_createtime= date('Y-m-d h-i-s');
                $model->user_id = $_SESSION['user_id'];
                if($model->save()){
                    //搜索出文件夹内的数据进行展示
                    $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
                    //搜索用户之前填的数据
                    $data = Business::find()->where(['user_id'=>$_SESSION['user_id']])->one();
                    return $this->render("company_add",['model'=>$model,'sort'=>$sort,'data'=>$data]);
                }else{
                    //让用户从新登陆获取ID
                    header("Content-Type: text/html;charset=utf-8");
                    echo "<script>alert('请从新登陆');location.href='index.php?r=login/login'</script>";
                }
            }else{
            $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
                return $this->render('companylist',['data'=>$data,'sort'=>$sort]);
        }

    }
    //公司信息添加
    public function actionCompany_add(){
        $model = new BusinessForm();
        $array_data = yii::$app->request->post();
//        判断用户是否有提交
        if($model -> load($array_data)){
//            执行图片上传，成功赋值，失败说明没有上传图片
            $model->imageFile= UploadedFile::getInstance($model, 'business_logo');
            $iimg=$model->upload();
            //不等于失败=成功
            if ($iimg!=false) {
                $array_data['BusinessForm']['business_logo']=$iimg.$model->imageFile->name;
            }
                //调用models层进行数据添加并返回一个是否成功的浮点型
                $sql = new Business();
                $end=$sql->array_add($array_data,$_SESSION['user_id']);
                if($end){
                    echo "<script>alert('成功');location.href='index.php?r=business/companylist'</script>";
                }else{
                    echo "<script>alert('失败');location.href='index.php?r=business/company_add'</script>";
                }
            } else{
                //搜索出文件夹内的数据进行展示
                $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
                //搜索用户之前填的数据
                $data = Business::find()->where(['user_id'=>$_SESSION['user_id']])->one();
                return $this->render("company_add",['model'=>$model,'sort'=>$sort,'data'=>$data]);
            }
        }



}