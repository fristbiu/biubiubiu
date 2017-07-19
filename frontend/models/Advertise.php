<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
class Advertise extends ActiveRecord
{
	public static function tableName()
	{
       return "advertise";
    }
}
?>