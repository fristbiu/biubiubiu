<center>
<h1><font color="red"><?=$_SESSION['admin_name'];?></font>管理员：欢迎使用后台管理系统！</h1>
<?php 
	echo "<br><br>当前所处环境是：".$_SERVER['HTTP_USER_AGENT'];
	echo "<br><br>当前域名是：".$_SERVER['HTTP_HOST'];
	echo "<br><br>当前服务器：".$_SERVER['SERVER_SOFTWARE'];
	echo '<br><br>当前PHP版本是：'.PHP_VERSION;
	echo "<br><br>当前服务器运行无故障！";
?>
</center>