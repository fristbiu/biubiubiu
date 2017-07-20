<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
/**
 * Created by PhpStorm.
 * User: 公司数据入库
 * Date: 2017/7/18
 * Time: 11:03
 */
class Business extends ActiveRecord{
    public static function tableName(){
        return "business";
    }
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['business_logo','business_text','business_name','business_bright','business_address','business_coordinate','business_text','business_chairman_name','business_product_name','business_product_address','business_product_text'],'string'],
            [['business_style','business_type','business_stage','business_desc','user_id','business_desc'],'integer']
        ];
    }
//    数据添加
    public function array_add($data,$id){
        $sql = $this->find()->where(['user_id'=>$id])->one();
//        $img = $sql->business_logo;
        //当数据库没图片而接收到图片则进行数据入库
        if(empty($sql->business_logo)&& !empty($data['BusinessForm']['business_logo'])){
            $sql->business_logo=  $data['BusinessForm']['business_logo'];
        }
        //当数据库有图片而且还接收到图片则说明是图片更换，进行删除图片更改数据库
        if(!empty($sql->business_logo)&& !empty($data['BusinessForm']['business_logo'])){
      @      unlink('../../uploads/business_logo/'.$sql->business_logo);
            $sql->business_logo=  $data['BusinessForm']['business_logo'];
        }
        $sql->business_name= $data['BusinessForm']['business_name'];
        $sql->business_product_name= $data['BusinessForm']['business_product_name'];
        $sql->business_chairman_name= $data['BusinessForm']['business_chairman_name'];
        $sql->business_bright= $data['BusinessForm']['business_bright'];
        $sql->business_coordinate= $data['BusinessForm']['business_coordinate'];
        $sql->business_address= $data['BusinessForm']['business_address'];
        $sql->business_product_address= $data['BusinessForm']['business_product_address'];
        $sql->business_text= $data['BusinessForm']['business_text'];
        $sql->business_style= $data['BusinessForm']['business_style'];
        $sql->business_type= $data['BusinessForm']['business_type'];
        $sql->business_stage= $data['BusinessForm']['business_stage'];
        $sql->business_product_text= $data['BusinessForm']['business_product_text'];
        $sql->business_desc=1;
        $sql->business_createtime= date('Y-m-d h-i-s');
        $sql->user_id=$_SESSION['user_id'];
        if($sql->save()){
            return true;
        }else{
            return false;
        }
    }

}