<?php
namespace frontend\models;
/**
 * Created by PhpStorm.
 * User: 用户信息表的表单
 * Date: 2017/7/12
 * Time: 9:59
 */
use Yii;
use yii\base\Model;
class PersonalForm extends Model{
    public $personal_name;
    public $personal_photo;
    public $personal_tel;
    public $personal_phone;
    public $personal_qq;
    public $personal_age;
    public $personal_sex;
    public $personal_experience;
    public $personal_proccess;
    public $personal_househld;
    public $personal_address;
    public $personal_jobtype;
    public $personal_jobstate;
    public $personal_dreamwork;
    public $personal_derammoney;
    public $personal_introduce;
    public $personal_resumenum;
    public $personal_lastsavetime;
    public $personal_success;
    public $user_id;



    public function rules()
    {
        return [
            // 在这里定义验证规则
        ];
    }
















}