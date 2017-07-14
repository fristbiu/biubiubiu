<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\jobtype;
use frontend\models\Personal;

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

                <?= $form->field($model, 'personal_name', ['inputOptions' => ['style' =>'width:4' ] ])->textInput(['value'=>$instory['personal_name']])->label('姓名') ?>

                <?= $form->field($model, 'personal_photo')->fileInput()->label('照片')?>

                <?= $form->field($model, 'personal_tel')->textInput(['value'=>$instory['personal_tel']])->label('电话') ?>

                <?= $form->field($model, 'personal_phone')->textInput(['value'=>$instory['personal_phone']])->label('固话') ?>

                <?= $form->field($model, 'personal_qq')->textInput(['value'=>$instory['personal_qq']])->label('QQ') ?>

                <?php $model->personal_age = $instory['personal_age']?>
                <?= $form->field($model, 'personal_age')->dropDownList($for_age, ['prompt'=>'请选择','style'=>'width:120px'])->label('年龄') ?>

                <?php $model->personal_sex = $instory['personal_sex']?>
                <?= $form->field($model, 'personal_sex')->radioList(['1'=>'男','0'=>'女'])->label('性别') ?>

                <?php $model->personal_experience = $instory['personal_experience']?>
                <?= $form->field($model, 'personal_experience')->dropDownList($sort['experience'], ['prompt'=>'请选择','style'=>'width:120px'])->label('工作经验') ?>

                <?php $model->personal_process = $instory['personal_process']?>
                <?= $form->field($model, 'personal_process')->dropDownList($sort['process'], ['prompt'=>'请选择','style'=>'width:120px'])->label('学历') ?>

                <?php $model->personal_household = $instory['personal_household']?>
                <?= $form->field($model, 'personal_household')->textInput(['value'=>$instory['personal_household']])->label('户籍') ?>

                <?= $form->field($model, 'personal_address')->textInput(['value'=>$instory['personal_address']])->label('现住地址') ?>

                <?php $model->personal_jobtype = $instory['personal_jobtype']?>
                <?= $form->field($model, 'personal_jobtype')->dropDownList($type, ['prompt'=>'请选择','style'=>'width:120px'])->label('工作类型') ?>

                <?php $model->personal_jobstate = $instory['personal_jobstate']?>
                <?= $form->field($model, 'personal_jobstate')->dropDownList($sort['job_start'], ['prompt'=>'请选择','style'=>'width:120px'])->label('工作状态') ?>

                <?php $model->personal_dreamwork = $instory['personal_dreamwork']?>
                <?= $form->field($model, 'personal_dreamwork')->dropDownList($type, ['prompt'=>'请选择','style'=>'width:120px'])->label('希望工作') ?>

                <?php $model->personal_dreammoney = $instory['personal_dreammoney']?>
                <?= $form->field($model, 'personal_dreammoney')->dropDownList($sort['firm_size'], ['prompt'=>'请选择','style'=>'width:120px'])->label('希望工资') ?>

                <?php $model->personal_introduce = $instory['personal_introduce']?>
                <?= $form->field($model, 'personal_introduce')->label("个人介绍")->textarea(['rows'=>4,'cols'=>5]) ?>

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">

                        <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div><!--end #basicInfo-->
			


			        </div><!--end .preview_content-->
  	</div><!--end #previewWrapper-->
<?php ActiveForm::end()?>






