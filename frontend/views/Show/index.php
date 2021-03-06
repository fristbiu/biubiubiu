﻿<?php
use yii\helpers\Html;
?>

<!--<script type="text/javascript" src="style/js/step6.js"></script>-->
<div id="sidebar">
    <div class="mainNavs">

        <?php echo $this->render('left_link')?>
    </div>
    <a class="subscribe" href="subscribe.html" target="_blank">订阅职位</a>
</div>
<div class="content">
    <div id="search_box">

        <ul id="searchType">
            <li data-searchtype="1" class="type_selected">职位</li>
            <li data-searchtype="2">公司</li>
        </ul>
        <div class="searchtype_arrow"></div>
        <input type="text" id="search_input" name = "kd"  tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />
        <input type="hidden" name="spc" id="spcInput" value=""/>
        <input type="hidden" name="pl" id="plInput" value=""/>
        <input type="hidden" name="gj" id="gjInput" value=""/>
        <input type="hidden" name="xl" id="xlInput" value=""/>
        <input type="hidden" name="yx" id="yxInput" value=""/>
        <input type="hidden" name="gx" id="gxInput" value="" />
        <input type="hidden" name="st" id="stInput" value="" />
        <input type="hidden" name="labelWords" id="labelWords" value="" />
        <input type="hidden" name="lc" id="lc" value="" />
        <input type="hidden" name="workAddress" id="workAddress" value=""/>
        <input type="hidden" name="city" id="cityInput" value=""/>
<!--        使用js跳转-->
        <?=Html::submitButton('搜索',['id'=>'search_button']);?>
        <!--                <input type="submit" id="search_button" value="搜索" />-->


    </div>
<style>
.ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
.ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
.ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
.ui-menu-item a{display:block;overflow:hidden;}
</style>
<script type="text/javascript" src="style/js/search.min.js"></script>
<dl class="hotSearch">
	<dt>热门搜索：</dt>
	<dd><a href="list.htmlJava?labelWords=label&city=">Java</a></dd>
	<dd><a href="list.htmlPHP?labelWords=label&city=">PHP</a></dd>
	<dd><a href="list.htmlAndroid?labelWords=label&city=">Android</a></dd>
	<dd><a href="list.htmliOS?labelWords=label&city=">iOS</a></dd>
	<dd><a href="list.html前端?labelWords=label&city=">前端</a></dd>
	<dd><a href="list.html产品经理?labelWords=label&city=">产品经理</a></dd>
	<dd><a href="list.htmlUI?labelWords=label&city=">UI</a></dd>
	<dd><a href="list.html运营?labelWords=label&city=">运营</a></dd>
	<dd><a href="list.htmlBD?labelWords=label&city=">BD</a></dd>
	<dd><a href="list.html?gx=实习&city=">实习</a></dd>
</dl>			
			<div id="home_banner">
	            <ul class="banner_bg">
	            		                <li  class="banner_bg_1 current" >
	                    <a href="h/subject/s_buyfundation.html?utm_source=DH__lagou&utm_medium=banner&utm_campaign=haomai" target="_blank"><img src="style/images/d05a2cc6e6c94bdd80e074eb05e37ebd.jpg" width="612" height="160" alt="好买基金——来了就给100万" /></a>
	                </li>
	                	                <li  class="banner_bg_2" >
	                    <a href="h/subject/s_worldcup.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=wc" target="_blank"><img src="style/images/c9d8a0756d1442caa328adcf28a38857.jpg" width="612" height="160" alt="世界杯放假看球，老板我也要！" /></a>
	                </li>
	                	                <li  class="banner_bg_3" >
	                    <a href="h/subject/s_xiamen.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=xiamen" target="_blank"><img src="style/images/d03110162390422bb97cebc7fd2ab586.jpg" width="612" height="160" alt="出北京记——第一站厦门" /></a>
	                </li>
	                	            </ul>
	            <div class="banner_control">
	                <em></em> 
	                <ul class="thumbs">
	                		                    <li  class="thumbs_1 current" >
	                        <i></i>
	                        <img src="style/images/4469b1b83b1f46c7adec255c4b1e4802.jpg" width="113" height="42" />
	                    </li>
	                    	                    <li  class="thumbs_2" >
	                        <i></i>
	                        <img src="style/images/381b343557774270a508206b3a725f39.jpg" width="113" height="42" />
	                    </li>
	                    	                    <li  class="thumbs_3" >
	                        <i></i>
	                        <img src="style/images/354d445c5fd84f1990b91eb559677eb5.jpg" width="113" height="42" />
	                    </li>
	                    	                </ul>
	            </div>
	        </div><!--/#main_banner-->
			
        	<ul id="da-thumbs" class="da-thumbs">
	        		        		<li >
	                    <a href="h/c/1650.html" target="_blank">
	                        <img src="style/images/a254b11ecead45bda166afa8aaa9c8bc.jpg" width="113" height="113" alt="联想" />
	                        <div class="hot_info">
	                        	<h2 title="联想">联想</h2>
	                            <em></em>
	                            <p title="世界因联想更美好">
	                            	世界因联想更美好
	                            </p>
	                        </div>
	                    </a>
	                </li>
                	        		<li >
	                    <a href="h/c/9725.html" target="_blank">
	                        <img src="style/images/c75654bc2ab141df8218983cfe5c89f9.jpg" width="113" height="113" alt="淘米" />
	                        <div class="hot_info">
	                        	<h2 title="淘米">淘米</h2>
	                            <em></em>
	                            <p title="将心注入 追求极致">
	                            	将心注入 追求极致
	                            </p>
	                        </div>
	                    </a>
	                </li>
                	        		<li >
	                    <a href="h/c/1914.html" target="_blank">
	                        <img src="style/images/2bba2b71d0b0443eaea1774f7ee17c9f.png" width="113" height="113" alt="优酷土豆" />
	                        <div class="hot_info">
	                        	<h2 title="优酷土豆">优酷土豆</h2>
	                            <em></em>
	                            <p title="专注于视频领域，是中国网络视频行业领军企业">
	                            	专注于视频领域，是中国网络视频行业领军企业
	                            </p>
	                        </div>
	                    </a>
	                </li>
                	        		<li >
	                    <a href="h/c/6630.html" target="_blank">
	                        <img src="style/images/f4822a445a8b495ebad81fcfad3e40e2.jpg" width="113" height="113" alt="思特沃克" />
	                        <div class="hot_info">
	                        	<h2 title="思特沃克">思特沃克</h2>
	                            <em></em>
	                            <p title="一家全球信息技术服务公司">
	                            	一家全球信息技术服务公司
	                            </p>
	                        </div>
	                    </a>
	                </li>
                	        		<li >
	                    <a href="h/c/2700.html" target="_blank">
	                        <img src="style/images/5caf8f9631114bf990f87bb11360653e.png" width="113" height="113" alt="奇猫" />
	                        <div class="hot_info">
	                        	<h2 title="奇猫">奇猫</h2>
	                            <em></em>
	                            <p title="专注于移动互联网、互联网产品研发">
	                            	专注于移动互联网、互联网产品研发
	                            </p>
	                        </div>
	                    </a>
	                </li>
                	        		<li  class="last" >
	                    <a href="h/c/1335.html" target="_blank">
	                        <img src="style/images/c0052c69ef4546c3b7d08366d0744974.jpg" width="113" height="113" alt="堆糖网" />
	                        <div class="hot_info">
	                        	<h2 title="堆糖网">堆糖网</h2>
	                            <em></em>
	                            <p title="分享收集生活中的美好，遇见世界上的另外一个你">
	                            	分享收集生活中的美好，遇见世界上的另外一个你
	                            </p>
	                        </div>
	                    </a>
	                </li>
                            </ul>
            
            <ul class="reset hotabbing">
            	            		<li class="current">热门职位</li>
            	            	
            </ul>
            <div id="hotList">
	            <ul class="hot_pos reset" id="html">
	            <?php foreach($newArr as $val){?>
	            	<li>
	            	<div class="hot_pos_l">
                    	<div class="mb10">
                        <a href="?r=toudi/toudi&id=<?=$val['advertise_id']?>" target="_blank"><?=$val['advertise_name']?>
                        &nbsp;
                        <span class="c9">[北京]</span></a> 
                        </div>
                        <span><em class="c7">月薪： </em><?=$val['advertise_money'];?></span>
                        <span><em class="c7">经验：</em><?=$val['advertise_experience']?></span>
                        <span><em class="c7">最低学历：</em> <?=$val['advertise_process']?></span>
                        <br />
                        <span><em class="c7">职位诱惑：</em>薪资高、发展空间大、前景优</span>
                        <br />
	                    <span><?=$val['advertise_star']?>发布</span>
                        <!-- <a  class="wb">分享到微博</a> -->
                    </div>
                	<div class="hot_pos_r">
                    	<div class="mb10"><a href="?r=business/companylist&id=<?=$val['bussiness']['bussiness_id']?>" target="_blank"><?=$val['bussiness']['business_name'];?></a></div>
                        <span><em class="c7">领域：</em> <?=$val['bussiness']['business_style'];?></span>
                        <span><em class="c7">创始人：</em><?=$val['bussiness']['business_chairman_name']?></span>
                        <br />
                        <span> <em class="c7">阶段： </em><?=$val['bussiness']['business_stage']?></span>
                        <span> <em class="c7">规模：<?=$val['bussiness']['business_type'];?></em></span>
                        <ul class="companyTags reset"><li>绩效奖金</li><li>五险一金</li><li>带薪年假</li></ul>
                    </div></li>

				<?php }?>
	                <a href="list.html?city=%E5%85%A8%E5%9B%BD" class="btn fr" target="_blank">查看更多</a>
	            </ul>
            </div>
            
            <div class="clear"></div>
			<div id="linkbox">
			    <dl>
			        <dt>友情链接</dt>
			        <dd>
			        		<a href="http://www.zhuqu.com/" target="_blank">住趣家居网</a> <span>|</span>
			          		<a href="http://www.zhubajie.com/" target="_blank" >创意服务外包</a><span>|</span>
			          		<a href="http://www.thinkphp.cn/" target="_blank" >thinkphp</a><span>|</span>
			          		<a href="http://www.chuangxinpai.com/" target="_blank" >创新派</a><span>|</span>

			          		<a href="http://w3cshare.com/" target="_blank" >W3Cshare</a><span>|</span>
			          		<a href="http://www.518lunwen.cn/" target="_blank" >论文发表网</a><span>|</span>
			          		<a href="http://www.199it.com" target="_blank" >199it</a><span>|</span>

			          		<a href="http://www.shichangbu.com" target="_blank" >市场部网</a><span>|</span>
			          		<a href="http://www.meitu.com/" target="_blank" >美图公司</a><span>|</span>
			          		<a href="https://www.teambition.com/" target="_blank" >Teambition</a>
			          		<a href="http://oupeng.com/" target="_blank" >欧朋浏览器</a><span>|</span>
			          		<a href="http://iwebad.com/" target="_blank">网络广告人社区</a>
			          		<a href="h/af/flink.html" target="_blank" class="more">更多</a>
			        </dd>
			    </dl>
			</div>
        </div>	
 	    <input type="hidden" value="" name="userid" id="userid" />
        <script type="text/javascript" src="style/js/Chart.min.js"></script>
        <script type="text/javascript" src="style/js/home.min.js"></script>
        <script type="text/javascript" src="style/js/count.js"></script>
        <div class="clear"></div>
        <input type="hidden" id="resubmitToken" value="" />
        <a id="backtop" title="回到顶部" rel="nofollow"></a>

<script>
    $(function(){
//        用来跳转页面的
        $('#search_button').click(function(){
//            获取查询公司还是职位
            var type=$('#searchType').children().first().attr('data-searchtype')
//            文本框里的值
            var text=$('#search_input').val()
            location.href="?r=show_where/index&&where_type="+type+"&&where_text="+text
        })
//        可以删除的，原来是用JS跳转的
        function html(data){
            var _html='<ul class="hot_pos reset" id="html">';
            $.each(data,function(key,val){
                _html+="<li>";
                _html+="<div class='hot_pos_1' style='float: left'>";
                _html+="<div class='mb10'>";
                _html+="<a href='h/jobs/120897.html' target='_blank'>"+val.advertise_name+"</a> ";
                _html+="&nbsp;";
                _html+="<span class='c9'>[北京]</span>";
                _html+='</div>'
                _html+="<span><em class='c7'>月薪： </em>"+val.advertise_money+"</span>";
                _html+="<span><em class='c7'>经验：</em>"+val.advertise_experience+"</span>";
                _html+="<span><em class='c7'>最低学历：</em> "+val.advertise_process+"</span>";
                _html+='<br />';
                _html+='<span><em class="c7">职位诱惑：</em>薪资高、发展空间大、前景优</span>';
                _html+='<br />';
                _html+='<span>'+val.advertise_star+'发布</span>';
                _html+='</div>';
                _html+='<div class="hot_pos_r">';
                _html+='<div class="mb10"><a href="h/c/8143.html" target="_blank">'+val.bussiness.business_name+'</a></div>';
                _html+='<span><em class="c7">领域：</em> '+val.bussiness.business_style+'</span>';
                _html+='<span><em class="c7">创始人：</em>'+val.bussiness.business_chairman_name+'</span>';
                _html+='<br />';
                _html+='<span> <em class="c7">阶段： </em>'+val.bussiness.business_stage+'</span>';
                _html+='<span> <em class="c7">规模：'+val.bussiness.business_type+'</em></span>';
                _html+='<ul class="companyTags reset"><li>绩效奖金</li><li>五险一金</li><li>带薪年假</li></ul>';
                _html+='</div></li>';
            })
            _html+='</ul>';
            $('#html').html(_html)
        }
    })
</script>