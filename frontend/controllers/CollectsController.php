<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 收藏
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use frontend\models\Collects;
class CollectsController extends CommonController
{
//    项目样式
    public $layout = 'common';

    //    收藏
    public function actionCollects(){
        $user = $_SESSION['user_id'];
        $data=Collects::find('user_id')->asArray()->where(["user_id"=>$user])->all();
var_dump($data);
//        return $this->render('collects',["data"=>$data]);
    }
    public function actionIndex(){
//        $advertise_id = yii::$app->request->get('advertise_id');
        $advertise_id=1;
        $user = $_SESSION['user_id'];
        $data=Collects::find()->asArray()->where(["user_id"=>$user,"advertise_id"=>1])->one();
        if(empty($data)){
            $sql = new Collects();
            $sql->user_id=$user;
            $sql->advertise_id=$advertise_id;
            $sql->admin_collect=date('Y-m-d h-i-s');
            if($sql->save()){
                return true;
            }else{
                return false;
            }
        }else{
            $results = Collects::find()->where(["user_id"=>$user,"advertise_id"=>1])->one();

            if( $results->delete()){
                echo true;
            }else{
                echo false;
            }
        }

    }
}
