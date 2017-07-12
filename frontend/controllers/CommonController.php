<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User:公共控制器
 * Date: 2017/7/11
 * Time: 11:27
 */
use Yii;
use yii\web\Controller;

class CommonController extends Controller{
	//定义session直接开启集成公共控制器的可直接使用
	public function init(){
        parent::init();
        session_start();
        //$session = Yii::$app->session;
    }
    public function xiangmu_url(){
        return dirname(dirname(__DIR__));
    }
    public function sss(){
        //获取固定信息
//        $b=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);

        //更改获得的固定信息
//        file_put_contents($this->xiangmu_url().'.\message.php',json_encode($b));
    }
}