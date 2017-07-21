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







}