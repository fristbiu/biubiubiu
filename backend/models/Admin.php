<?php 
namespace backend\models;
use Yii;
use yii\db\ActiveRecord;
class Admin extends ActiveRecord
{
	public $verifyCode;
	public function attributeLabels()
	{
		return array(
			'admin_name'=>'输入登录名：',
			'admin_pwd'=>'请输入登录密码：',
			'verifyCode'=>'验证码'
		);
	}

	public function rules()
    {
        return [
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
        ];
    }
}

?>