<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class BusinessForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $business_name;
    public $business_logo;
    public $business_bright;
    public $business_address;
    public $business_coordinate;
    public $business_text;
    public $business_style;
    public $business_type;
    public $business_stage;
    public $business_chairman_name;
    public $business_product_name;
    public $business_product_address;
    public $business_product_text;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['business_name','business_bright','business_address','business_coordinate','business_text','business_style','business_type','business_stage','business_chairman_name','business_product_name','business_product_address','business_product_text'],'required']
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $rand=time().rand(1111,9999);
            $this->imageFile->saveAs('../../uploads/business_logo/' .$rand. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $rand;
        } else {
            return false;
        }
    }
}