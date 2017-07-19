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
class Jobtype extends ActiveRecord{
   public static function tableName(){
       return "jobtype";
   }
}