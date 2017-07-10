<?php
namespace backend\models;
/**
 * Created by PhpStorm.
 * User: junyu
 * Date: 2017/7/8
 * Time: 10:41
 */
use Yii;

class Profession_type extends \yii\db\ActiveRecord{
    public static function tableName(){
        return "profession_type";
    }
}