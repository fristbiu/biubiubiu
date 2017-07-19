<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\jobtype;

?>
<style type="text/css">
    #allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=MTsMNSb0VSGDsGWFejiDY4oix8im8l2E"></script>
<?php
//工作类型查询库
$jobtype=jobtype::find()->where('parent_id>0')->asArray()->all();
$type=array();
foreach($jobtype as $key=>$val){
    $type[$val['jobtype_id']]=$val['jobtype_name'];
}
//年龄
$for_age=array();
for($i=1;$i<90;$i++){
    $for_age[]=$i."岁";
}

//form表单开始
$form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data',
    ],
//    'action' => 'index.php?r=people/people_one_add'
]);
?>
  	<div id="previewWrapper">
        <div class="preview_header">
            <h1 title="jason的简历">更改</h1>
                    </div><!--end .preview_header-->

        <div class="preview_content">
            <div class="profile_box" id="basicInfo">
                <?php $model->business_name=$data['business_name']?>
                <?= $form->field($model, 'business_name', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('公司名称') ?>
                <?php $model->business_product_name=$data['business_product_name']?>
                <?= $form->field($model, 'business_product_name', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('生产名称') ?>
                <?php if(empty($data['business_logo'])){?>
                <?= $form->field($model, 'business_logo')->fileInput()->label('logo')?>
                <?php }else{?>

                    <?= $form->field($model, 'business_logo')->fileInput()->label('logo')?>
                    <img src="../../uploads/business_logo/<?= $data['business_logo']?>">
                <?php }?>
                <?php $model->business_chairman_name=$data['business_chairman_name']?>
                <?= $form->field($model, 'business_chairman_name', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('创始人姓名') ?>
                <?php $model->business_bright=$data['business_bright']?>
                <?= $form->field($model, 'business_bright', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('名言') ?>
                <p></p><p></p>
                <div id="allmap"></div>
                <?php $model->business_coordinate=$data['business_coordinate']?>
                <?= $form->field($model, 'business_coordinate', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('公司百度坐标') ?>
                <?php $model->business_address=$data['business_address']?>
                <?= $form->field($model, 'business_address', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('地址') ?>
                <?php $model->business_product_address=$data['business_product_address']?>
                <?= $form->field($model, 'business_product_address', ['inputOptions' => ['style' =>'width:4' ] ])->textInput()->label('产品地址') ?>
                <?php $model->business_text=$data['business_text']?>
                <?= $form->field($model, 'business_text')->label("公司介绍")->textarea(['rows'=>4,'cols'=>5]) ?>
                <?php $model->business_style=$data['business_style']?>
                <?= $form->field($model, 'business_style')->dropDownList($type, ['prompt'=>'请选择','style'=>'width:120px'])->label('类型（领域）') ?>
                <?php $model->business_type=$data['business_type']?>
                <?= $form->field($model, 'business_type')->dropDownList($sort['firm_size'], ['prompt'=>'请选择','style'=>'width:120px'])->label('发展规模') ?>
                <?php $model->business_stage=$data['business_stage']?>
                <?= $form->field($model, 'business_stage')->dropDownList($sort['stage'], ['prompt'=>'请选择','style'=>'width:120px'])->label('发展阶段') ?>
                <?php $model->business_product_text=$data['business_product_text']?>
                <?= $form->field($model, 'business_product_text')->label("产品介绍")->textarea(['rows'=>4,'cols'=>5]) ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div><!--end #basicInfo-->
			        </div><!--end .preview_content-->
  	</div><!--end #previewWrapper-->
<?php ActiveForm::end()?>
<script>
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    map.centerAndZoom("北京",12);
    //单击获取点击的经纬度
    map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
    map.addEventListener("click",function(e){
        $("#businessform-business_coordinate").val(e.point.lng + "," + e.point.lat)
    });
</script>






