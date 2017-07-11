<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: 后台首页
 * Date: 2017/7/6
 * Time: 10:28
 */
use yii\web\Controller;

use backend\models\Profession_type;
class ShowController extends Controller{
    //此网页里有递归，↓是递归用来接收数组的
    public $recursion=array();
    public function actionIndex(){
        header("Content-Type: text/html;charset=utf-8");
        $sql=Profession_type::find()->asArray()->all();
        //递归
        $this->biu_digui($sql,0);
        print_r($this->recursion);




//        return $this->renderPartial('index.html');
    }

//    职位类型数据处理（使用递归改变数组）
    function biu_digui($data=array(),$parent,$style="-"){

        foreach($data as $key=>$val){
            if($val['parent_id']==$parent){

                $this->recursion[$val['id']] = $val['pro_name'];

                $this->biu_digui($data,$val['id'],"-".$style);

            }
        }

    }
}