<?php 
/**
 * 后台公共控制器
 * @access private
 */
namespace backend\controllers;
use Yii;
use yii\web\Controller;
class CommonController extends Controller
{
	public function init(){
        parent::init();
        session_start();
        //$session = Yii::$app->session;
    }
}
?>