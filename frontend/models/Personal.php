<?php
namespace frontend\models;
/**
 * Created by PhpStorm.
 * User: 用户信息表
 * Date: 2017/7/12
 * Time: 9:55
 */
use Yii;
use yii\db\ActiveRecord;
class Personal extends ActiveRecord{

    public static function tableName(){
        return "personal";
    }
    public function rules()
    {
        return [

            [['personal_photo'], 'safe'],
            [['personal_name','personal_address','personal_household','personal_introduce'], 'safe'],
            [['personal_tel','personal_phone','personal_qq','personal_age','personal_sex','personal_experience'],'safe'],
            [['personal_jobtype','personal_jobstate', 'personal_dreamwork','personal_dreammoney','personal_process'],'safe'],
            [['user_id'],'required']
        ];
    }
    public function table_add($data,$id){
        $sql = $this->find()->where(['user_id'=>$id])->one();
        if(empty($sql->personal_photo)&& !empty($data['PersonalForm']['personal_photo'])){
            $sql->personal_photo= $data['PersonalForm']['personal_photo'];
        }
        //当数据库有图片而且还接收到图片则说明是图片更换，进行删除图片更改数据库
        if(!empty($sql->personal_photo)&& !empty($data['PersonalForm']['personal_photo'])){
        @    unlink('../../uploads/user_head/'.$sql->personal_photo);
            $sql->personal_photo= $data['PersonalForm']['personal_photo'];
        }
        $sql->personal_name= $data['PersonalForm']['personal_name'];
        $sql->personal_tel= $data['PersonalForm']['personal_tel'];
        $sql->personal_phone= $data['PersonalForm']['personal_phone'];
        $sql->personal_qq= $data['PersonalForm']['personal_qq'];
        $sql->personal_age= $data['PersonalForm']['personal_age'];
        $sql->personal_sex= $data['PersonalForm']['personal_sex'];
        $sql->personal_experience= $data['PersonalForm']['personal_experience'];
        $sql->personal_process= $data['PersonalForm']['personal_process'];
        $sql->personal_household= $data['PersonalForm']['personal_household'];
        $sql->personal_address= $data['PersonalForm']['personal_address'];
        $sql->personal_jobtype= $data['PersonalForm']['personal_jobtype'];
        $sql->personal_jobstate= $data['PersonalForm']['personal_jobstate'];
        $sql->personal_dreamwork= $data['PersonalForm']['personal_dreamwork'];
        $sql->personal_dreammoney= $data['PersonalForm']['personal_dreammoney'];
        $sql->personal_introduce= $data['PersonalForm']['personal_introduce'];
        $sql->personal_resumenum=$sql->personal_resumenum+1;
        $sql->personal_lastsavetime=date('Y-m-d h-i-s');
        $sql->personal_success=0;
        if($sql->save()){
            return true;
        }else{
            return false;
        }

    }


















}