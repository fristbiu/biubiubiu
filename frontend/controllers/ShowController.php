<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 首页展示
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\web\Controller;
use backend\models\Profession_type;
class ShowController extends Controller{
//    项目样式
    public $layout='common';
//    首页
    public function actionIndex(){
        $sql=Profession_type::find()->asArray()->all();
        return $this->render('index');
    }

//    我的所有简历
    public function actionJianli_list(){
        return $this->render('jianli_list');
    }
//        单个简历
    public function actionJianli_one(){
        return $this->render('jianli_one');
    }
//    公司------显示所有公司列表
    public function actionCompanylist(){
        return $this->render('companylist');
    }

    //    公司招聘信息简介------点击公司显示公司招聘要求
    public function actionToudi(){
//        return $this->renderPartial('toudi.html');
        return $this->render('toudi');
    }

//        公司发布新职位
    public function actionCreate(){
        return $this->render('create');
    }
    public function actionHave_refus(){
        return $this->render('have_refus');
    }
//    发布的职位------发布---下线职位
    public function actionPositions(){
        return $this->render('positions');
    }


//    收藏
    public function actionCollections(){
        return $this->render('collections');
    }
//    个人信息
    public function actionMessage_people(){
        return $this->render('message_people');
    }
}