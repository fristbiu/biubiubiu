<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/public.css">
</head>
<body>
<div class="public-header-warrp">
    <div class="public-header">
        <div class="content">
            <div class="public-header-logo"><a href=""><i>LOGO</i><h3>拓源网络科技</h3></a></div>
            <div class="public-header-admin fr">
                <p class="admin-name"><font color="red"><?=$_SESSION['admin_name']?></font>管理员 您好！</p>
                <div class="public-header-fun fr">
                    <!-- <a href="" class="public-header-man">管理</a> -->
                    <a href="?r=login/loginout" class="public-header-loginout">安全退出</a>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- 内容展示 -->
<div class="public-ifame mt20">
    <div class="content">
    <!-- 内容模块头 -->
       
        <div class="clearfix"></div>
        <!-- 左侧导航栏 -->
        <div class="public-ifame-leftnav">
            <div class="public-title-warrp">
                <div class="public-ifame-title ">
                    <a href="">首页</a>
                </div>
            </div>
            <ul class="left-nav-list">
                <li class="public-ifame-item">
                    <a href="">公司审核</a>
                </li>
                <li class="public-ifame-item">
                    <a href="">个人简历管理</a>
                </li>
                <li class="public-ifame-item">
                    <a href="">轮播图管理</a>
                </li>
                <li class="public-ifame-item">
                    <a href="">系统管理</a>
                </li>
            </ul>
        </div>
        <!-- 右侧内容展示部分 -->
        <div class="public-ifame-content">
        <?=$content;?>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
</body>
</html>