<?php
namespace frontend\controllers;
/**
 * Created by PhpStorm.
 * User: 首页展示
 * Date: 2017/7/5
 * Time: 21:12
 */
use Yii;
use yii\helpers\Url;
use frontend\controllers\ShowController;
use frontend\models\Business;
use frontend\models\Advertise;
class Show_whereController extends CommonController{
    //项目样式
    public $layout='common';

    /**
     * 首页的展示
     * @access public
     */

    public function actionIndex(){
        //用来查询工作表
        $where_advertise=" where advertise_allow=1 ";
        //用来查询公司表
        $where_bussiness=" where business_success=1 ";
//        接值进行判断，拼出查询语句
        $get = Yii::$app->request->get();
        if(!empty($get['where_text'])){
        if(!empty($get['where_type']) && $get['where_type']==1){
            $where_advertise.=" and advertise_name like '%".$get['where_text']."%'";
            }else{
            $where_bussiness.=" and business_name like '%".$get['where_text']."%'";
            }
        }
        $advertise = Yii::$app->db->createCommand("SELECT * FROM advertise ".$where_advertise)
            ->queryAll();
        $bussiness = Yii::$app->db->createCommand("SELECT * FROM business ".$where_bussiness)
            ->queryAll();
//        数组的处理
        foreach($bussiness as $key=>$val){
            foreach($advertise as $k=>$v){
                if($val['bussiness_id']==$v['bussiness_id']) {
                    $bussiness[$key]['advertise'][] = $v;
                }
//                删除已经用过的值，减少重复循环
                unset($advertise[$k]);
            }
//            删除没有发布工作的公司
            if(empty($bussiness[$key]['advertise'])){
                unset($bussiness[$key]);
            }
        }
//        小数据
        $sort=json_decode(file_get_contents($this->xiangmu_url().'.\message.php'),true);
//        类型分类
        $job = \frontend\models\Jobtype::find()->where('parent_id>0')->asArray()->all();
        $job_z= array();
        foreach($job as $key=>$val){
            $job_z[$val['jobtype_id']]=$val['jobtype_name'];
        }
        return $this->render('companylis1t',['business'=>$bussiness,'sort'=>$sort,'job'=>$job_z]);


    }
    //公共方法
    public function addinfo($business,$advertise)
    {
        foreach($advertise as $key=>&$val){
            $i=0;
            foreach($business as $k=>$v){
                if($val['bussiness_id']==$v['bussiness_id']){
                    $val['bussiness']=$v;
                    $i++;
                }
            }
            if($i==0){
                unset($advertise[$key]);
            }
        }
        return $advertise;
    }
}