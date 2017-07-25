<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/login.css" />
</head>
<body>
<div class="page">
	<div class="loginwarrp">
		<div class="logo">管理员登陆</div>
        <div class="login_form">
			<!-- <form id="Login" name="Login" method="post" onsubmit="" action=""> -->
			<?php $form=ActiveForm::begin(array('id'=>'Login','action'=>array('login/index'),'method'=>'post'));?>	
				<li class="login-item">
					<?=$form->field($model,'admin_name')->textInput(array('name'=>'admin_name','class'=>'login_input'));?>
				</li>
				<li class="login-item">
					<?=$form->field($model,'admin_pwd')->textInput(array('name'=>'admin_pwd','class'=>'login_input'));?>
				</li>
				<li class="login-item verify">
					<!-- <input type="text" name="CheckCode" class="login_input verify_input"> -->
				<?=$form->field($model,'verifyCode')->widget(Captcha::className());?>
				</li>
				<!-- <img src="images/verify.png" border="0" class="verifyimg" /> -->
				<div class="clearfix"></div>
				<li class="login-sub">
					<?php //echo Html::submitButton('登&nbsp;录',array())?>
					<input type="submit" name="" value="登录" />
				</li>                      
          	<?php ActiveForm::end();?>
		</div>
	</div>
</div>
</body>
</html>