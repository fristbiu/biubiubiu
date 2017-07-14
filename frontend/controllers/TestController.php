<?php
/**
 * Created by PhpStorm.
 * User: junyu
 * Date: 2017/7/12
 * Time: 11:26
 */

namespace frontend\controllers;
use yii\web\controller;

class TestController extends controller{
    function actionTest(){
        echo "lll";
        $rs=\Yii::$app->db->createCommand("select * from jobtype");
        $row=$rs->queryAll();
        print_r($row);
    }
}