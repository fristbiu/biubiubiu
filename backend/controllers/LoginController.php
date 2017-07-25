<?php
namespace backend\controllers;
/**
 * 后台登录
 * User: 豆俊宇
 * Date: 2017/7/5
 * Time: 14:32
 */
use Yii;
use yii\web\Controller;
use backend\models\Admin;
class LoginController extends CommonController{
    
	/**
	 * 后台登录
	 * @return [type] [description]
	 */
    public function actionIndex()
    {
    	if(Yii::$app->request->post()){
    		//接收数据
	    	$data=Yii::$app->request->post();
	    	$userInfo=Admin::find()->where(array('admin_name'=>$data['admin_name'],'admin_pwd'=>md5($data['admin_pwd'])))->asArray()->one();
	    	if($userInfo){
	    		//设置session
	    		$_SESSION['admin_name']=$data['admin_name'];
	    		$_SESSION['admin_id']=$userInfo['admin_id'];
	    		echo "<script>alert('登陆成功！');location.href='?r=show/index'</script>";
	    	}else{
	    		echo "<script>alert('账号或密码错误，请重新登陆!');location.href='?r=login/index'</script>";
    		}
    	}else{
    		$model=new Admin;
        	return $this->renderPartial('login',array('model'=>$model));
    	}
    }

    /**
     * 管理员的退出
     * @access public 
     * @author Ren
     */
    public function actionLoginout()
    {
    	//删除SESSION数据
    	unset($_SESSION['admin_id']);
    	unset($_SESSION['admin_name']);
    	echo "<script>alert('退出成功！');location.href='?r=login/index'</script>";
    }

    /**
     * 验证码
	 * @access public 
	 * @param  array
	 */
	public function actions()
	{
	    return array(
	        'captcha' => array(
              	'class' => 'yii\captcha\CaptchaAction', 
				'backColor' => 0xF5F5F5,
				'transparent'=>true,
				'minLength'=>4,  //最短为4位
				'maxLength'=>4,   //是长为4位
	        ),
	    );
	}

}