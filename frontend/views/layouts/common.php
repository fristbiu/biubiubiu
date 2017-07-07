<?php
use yii\web\Session;
$session = \YII::$app->session;
$session->open();
?>
<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate" media="handheld"  />
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>拉勾网-最专业的互联网招聘平台</title>
    <meta property="qc:admins" content="23635710066417756375" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
        var ctx = "h";
        console.log(1);
    </script>
    <link rel="Shortcut Icon" href="h/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
<!--    公司展示招聘细心页面-->
    <script type="text/javascript" src="style/js/jquery-hbzx.js"></script>

    <script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
    <script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/additional-methods.js"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var youdao_conv_id = 271546;
    </script>
    <script type="text/javascript" src="style/js/conv.js"></script>
</head>
<body>
<?php
$controllerID = Yii::$app->controller->id;
$actionID = Yii::$app->controller->action->id;
?>
<div id="body">
    <div id="header">
        <div class="wrapper">
            <a href="index.html" class="logo">
                <img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li class="<?php if($actionID=='index'){echo 'current'; }?>"><a href="?r=show/index">首页</a></li>
                <li class="<?php if($actionID=='companylist'){echo 'current'; }?>"><a href="?r=show/companylist" >公司</a></li>
                <li class="<?php if($actionID=='jianli_list'){echo 'current'; }?>"><a href="?r=show/jianli_list" rel="nofollow">所有简历</a></li>
<!--                用户不用显示-->
                <li class="<?php if($actionID=='create'){echo 'current'; }?>"><a href="?r=show/create" rel="nofollow">发布职位</a></li>
            </ul>
            <?php if(!empty($session['user'])){?>
            <ul class="loginTop">
                <li><a href="login.html" rel="nofollow">登录</a></li>
                <li>|</li>
                <li><a href="register.html" rel="nofollow">注册</a></li>
            </ul>
            <?php }else{?>
            <dl class="collapsible_menu">
                <dt>
                    <span>jason&nbsp;</span>
                    <span class="red dn" id="noticeDot-0"></span>
                    <i></i>
                </dt>
                <dd><a rel="nofollow" href="?r=show/jianli_list">我的简历列表</a></dd>
                <dd><a href="?r=show/collections">我收藏的职位</a></dd>
                <dd class="btm"><a href="subscribe.html">我应聘的职位</a></dd>
                <dd><a href="create.html">个人中心</a></dd>
                <dd><a href="accountBind.html">账号安全</a></dd>
                <dd class="logout"><a rel="nofollow" href="login.html">退出</a></dd>
            </dl>
<!--                <div class="dn" id="noticeTip">-->
<!--                    <span class="bot"></span>-->
<!--                    <span class="top"></span>-->
<!--                    <a target="_blank" href="delivery.html"><strong>0</strong>条新投递反馈</a>-->
<!--                    <a class="closeNT" href="javascript:;"></a>-->
<!--                </div>-->
            <?php }?>

        </div>
    </div><!-- end #header -->
    <div id="container">


    <?=$content;?>



</div><!-- end #container -->
</div><!-- end #body -->
<div id="footer">
    <div class="wrapper">
        <a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
        <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
        <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
        <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
        <div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
    </div>
</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!--<script type="text/javascript">-->
<!--    $(function(){-->
<!--        $('#noticeDot-1').hide();-->
<!--        $('#noticeTip a.closeNT').click(function(){-->
<!--            $(this).parent().hide();-->
<!--        });-->
<!--    });-->
<!--    var index = Math.floor(Math.random() * 2);-->
<!--    var ipArray = new Array('42.62.79.226','42.62.79.227');-->
<!--    var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";-->
<!--    var CallCenter = {-->
<!--        init:function(url){-->
<!--            var _websocket = new WebSocket(url);-->
<!--            _websocket.onopen = function(evt) {-->
<!--                console.log("Connected to WebSocket server.");-->
<!--            };-->
<!--            _websocket.onclose = function(evt) {-->
<!--                console.log("Disconnected");-->
<!--            };-->
<!--            _websocket.onmessage = function(evt) {-->
<!--                //alert(evt.data);-->
<!--                var notice = jQuery.parseJSON(evt.data);-->
<!--                if(notice.status[0] == 0){-->
<!--                    $('#noticeDot-0').hide();-->
<!--                    $('#noticeTip').hide();-->
<!--                    $('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');-->
<!--                    $('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');-->
<!--                }else{-->
<!--                    $('#noticeDot-0').show();-->
<!--                    $('#noticeTip strong').text(notice.status[0]);-->
<!--                    $('#noticeTip').show();-->
<!--                    $('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');-->
<!--                    $('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');-->
<!--                }-->
<!--                $('#noticeDot-1').hide();-->
<!--            };-->
<!--            _websocket.onerror = function(evt) {-->
<!--                console.log('Error occured: ' + evt);-->
<!--            };-->
<!--        }-->
<!--    };-->
<!--    CallCenter.init(url);-->
<!--</script>-->

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>
