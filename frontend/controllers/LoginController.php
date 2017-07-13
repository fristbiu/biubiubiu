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
                $bloon=User::updateAll(array('last_time'=>date('Y-m-d H:i:s')),"user_id=:userid",array(':userid'=>$userData['user_id']));
    			$_SESSION['user_id']=$userData['user_id'];
    			$_SESSION['user_name']=$userData['user_name'];
    			echo "<script>alert('登录成功！');location.href='?r=show/index'</script>";
    		}else{
    			echo "<script>alert('账号或密码错误，请重新登录！');location.href='?r=login/login'</script>";
    		}
    	}else{
    		$model=new User();
        	return $this->renderPartial('login',array('model'=>$model));
    	}
    }

    /**
     * 用户的退出
     * @access public
     */
    public function actionLoginout(){
        //删除session
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        echo "<script>alert('退出成功，正在返回主页。');location.href='?r=show/index'</script>";
    }


    /**
     * 用户的注册
     * @access public
     */
    public function actionRegister(){
        header("content-type:text/html;charset=utf8");
        if(Yii::$app->request->isPost){
            //接收数据
            $data=Yii::$app->request->post();
            $userData=User::find()->where(array('user_name'=>$data['user_name']))->asArray()->one();
            if($userData){
                die("<script>alert('用户名已经存在，请更换用户名重新尝试！');location.href='?r=login/register'</script>");
            }
            $user=new User();
            $user->user_name=$data['user_name'];
            $user->user_pwd=md5($data['user_pwd']);
            $user->user_type=$data['user_type'];
            $user->user_phone=$data['user_phone'];
            $user->reg_time=date('Y-m-d H:i:s');
            $user->last_time=date('Y-m-d H:i:s');
            // var_dump($user);
            // echo "<pre>";
            // print_r($data);die;
            $bloon=$user->save();
            if($bloon){
                $_SESSION['user_id']=$bloon;
                $_SESSION['user_name']=$data['user_name'];
                echo "<script>alert('注册成功，正在跳转至首页!');location.href='?r=show/index'</script>";
            }else{
                echo "<script>alert('注册失败!');location.href='?r=login/register'</script>";
            }
        }else{
            $model=new User();
            return $this->renderPartial('register',array('model'=>$model)); 
        }
    }


}











    


