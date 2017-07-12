<?php
namespace frontend\controllers;

/**
 * Created by PhpStorm.
 * User: 登录模块
 * Date: 2017/7/8
 * Time: 8:05
 */
use Yii;
use yii\web\Controller;
use frontend\models\user;
use yii\helpers\Html;
class LoginController extends CommonController{
    /**
     * 用户的登录，提交登录
     * @access public 
     * @author Ren
     */
    public function actionLogin(){
    	//判断是登录还是验证登录
    	if(Yii::$app->request->isPost){
    		//接收数据Html::encode
    		$data=Yii::$app->request->post();
    		$userData=User::find()->where(array('user_name'=>Html::encode($data['user_name']),'user_pwd'=>md5(Html::encode($data['user_pwd']))))->asArray()->one();
    		if($userData){
    			$_SESSION['user_id']=$userData['user_id'];
    			$_SESSION['user_name']=$userData['user_name'];
    			//var_dump($session);
    			echo "<script>alert('登录成功！');location.href='?r=show/index'</script>";
    		}else{
    			echo "<script>alert('账号或密码错误，请重新登录！');location.href='?r=login/login'</script>";
    		}
    	}else{
    		$model=new User();
        	return $this->renderPartial('login',array('model'=>$model));
    	}
    }
//    注册
    public function actionRegister(){
        return $this->renderPartial('register');
    }


}











    


