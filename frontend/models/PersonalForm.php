<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class PersonalForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $personal_name;
    public $personal_photo;
    public $personal_tel;
    public $personal_phone;
    public $personal_qq;
    public $personal_age;
    public $personal_sex;
    public $personal_experience;
    public $personal_process;
    public $personal_household;
    public $personal_address;
    public $personal_jobtype;
    public $personal_jobstate;
    public $personal_dreamwork;
    public $personal_dreammoney;
    public $personal_introduce;
//    public $user_id;

//    public function rules()
//    {
//        return [
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
//        ];
//    }
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg',],
//            [['personal_name','personal_photo','personal_introduce','imageFile'], 'string'],
//            [['personal_address','personal_household'], 'string'],
//
//            [['personal_tel','personal_phone','personal_qq','personal_age','personal_sex','personal_experience'],'integer'],
//            [['personal_jobtype','personal_jobstate', 'personal_dreamwork','personal_dreammoney','personal_process'],'integer'],
//            [['user_id'],'required']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $rand=time().rand(1111,9999);
            $this->imageFile->saveAs('../../uploads/user_head/' .$rand. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $rand;
        } else {
            return false;
        }
    }
}