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
        $data=$model->find()->where(['user_id'=>$_SESSION['user_id']])->one();
        if(empty($data)){
                $model->business_createtime= date('Y-m-d h-i-s');
                $model->user_id = $_SESSION['user_id'];
                $model->save();
            }
        return $this->render('companylist');
    }
    //公司信息添加
    public function actionCompany_add(){
        $model = new BusinessForm();
        $array_data = yii::$app->request->post();
        if($model -> load($array_data)){
            $model->imageFile= UploadedFile::getInstance($model, 'business_logo');
            $iimg=$model->upload();
            if ($iimg!=false) {
                header("Content-Type: text/html;charset=utf-8");
//                echo $iimg.$model->imageFile->name."<br>";
                $array_data['BusinessForm']['business_logo']=$iimg.$model->imageFile->name;
            }
                $sql = new Business();

                $end=$sql->array_add($array_data,$_SESSION['user_id']);
//                var_dump($end);
                if($end){
                    echo "<script>alert('成功');location.href='index.php?r=business/companylist'</script>";

                }else{
                    echo "<script>alert('失败');location.href='index.php?r=business/company_add'</script>";

                }
            } else{
                $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
    //        header("Content-Type: text/html;charset=utf-8");
    //var_dump($sort);die;
            $data = Business::find()->where(['user_id'=>$_SESSION['user_id']])->one();
                return $this->render("company_add",['model'=>$model,'sort'=>$sort,'data'=>$data]);
            }

        }



}