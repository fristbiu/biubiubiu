<?php
namespace frontend\models;
/**
 * Created by PhpStorm.
 * User: junyu
 * Date: 2017/7/10
 * Time: 15:44
 */
use Yii;
class Profession_type extends Yii\db\ActiveRecord{
    public static function tableName(){
        return "profession_type";
    }
}