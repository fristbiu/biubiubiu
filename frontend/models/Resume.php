<?php 
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
class Resume extends ActiveRecord
{
	public function attributeLabels()
	{
		return array(
			'resume_name'=>'请输入用户名：',
			'resume_qq'=>'请输入QQ号：',
			'resume_tel'=>'请输入电话：',
			'resume_age'=>'请输入年龄：',
			'resume_process'=>'请输入您的学历：',
			'resume_experience'=>'请描述您的工作经验：',
			'resume_historywork'=>'请描述您的历史工工作：',
			'resume_workaddress'=>'输入您的历史工作地址：'
		);
	}
}
?>