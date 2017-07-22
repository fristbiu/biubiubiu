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
use backend\models\Profession_type;
use frontend\models\Business;
use frontend\models\Advertise;
class ShowController extends CommonController{
    //项目样式
    public $layout='common';

    /**
     * 首页的展示
     * @access public
     */
    public function actionIndex(){
    	//处理公司和简历的数据
    	$business=Business::find()->where(array('business_success'=>1))->asArray()->all();
    	$advertise=Advertise::find()->where(array('advertise_allow'=>1,'status'=>1))->limit(20)->asArray()->all();
		//整合数据
    	$newArr=$this->addinfo($business,$advertise);
        return $this->render('index',array('newArr'=>$newArr));
    }


    /**
     * 处理数组，公司和及发布的职位想结合，公司未通过就不显示简历
     * @access public
     * @param  $business
     * @param  $advertise
     * @return array
     */
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
    public function actionWhere(){
//        $business = Business::find()->where(['bussiness_id'=>[1,2,3]])->asArray()->all();
//        echo  json_encode($business);die;
        $get = Yii::$app->request->get();
        if($get['type']==1){
            $advertise = Yii::$app->db->createCommand("SELECT * FROM advertise where advertise_allow=1 and advertise_name like '%".$get['text']."%'")
                ->queryAll();
            if($advertise){
//                $business
                $bussiness_id=array();
                foreach($advertise as $key=>$val){
                    $bussiness_id[]=$val['bussiness_id'];
                }
                $business = Business::find()->where(['bussiness_id'=>$bussiness_id])->asArray()->all();
                return  json_encode($this->addinfo($business,$advertise));
            }

        }elseif($get['type']==2){
            $bussiness = Yii::$app->db->createCommand("SELECT * FROM business where business_success=1 and business_name like '%".$get['text']."%'")
                ->queryAll();

            if($bussiness){
                $bussiness_id=array();
                foreach($bussiness as $key=>$val){
                    $bussiness_id[]=$val['bussiness_id'];
                }

                $advertise = Advertise::find()->where(['bussiness_id'=>$bussiness_id])->asArray()->all();
                return  json_encode($this->addinfo($bussiness,$advertise));
//                return  json_encode($advertise);
            }

        }



    }







}