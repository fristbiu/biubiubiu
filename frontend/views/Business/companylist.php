<?php
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

?>


        <!-- <script src="style/js/swfobject_modified.js" type="text/javascript"></script> -->
        <div class="clearfix">
        				
            <div class="content_l">           
	                <div class="c_detail">
	                	<div style="background-color:#fff;" class="c_logo">
		                	<a title="上传公司LOGO" id="logoShow" class="inline cboxElement" href="#logoUploader">
		                				                			<img width="190" height="190" alt="公司logo" src="../../uploads/business_logo/<?= $data['business_logo']?>">
	                        		                        	

	                        </a>
		                </div>


		                
	                    <div class="c_box companyName">
	                    		                   			<h2 title="平潭协创进出口贸易有限公司"><?= $data['business_name']?></h2>
	                   			                        
	                        	                        	<em class="unvalid"></em>
                        		<span class="va dn">标志</span>
	                        	<a target="_blank" class="applyC" href="index.php?r=business/company_add">点击更改</a>
	                        	                        <div class="clear"></div>
	                       	

	                        	                        

	                            
	                        <div class="clear oneword"><img width="17" height="15" src="style/images/quote_l.png">&nbsp; <span><?= $data['business_text']?></span> &nbsp;<img width="17" height="15" src="style/images/quote_r.png"></div>



	                    </div>

	                	<div class="clear"></div>
	                </div>
                
                	<div class="c_breakline"></div>
       
       				<div id="Product">
        					        				
	        					<div class="product_wrap">


					                <!--有产品-->
					                <dl class="c_product">
					                	<dt>
					                    	<h2><em></em>公司产品</h2>
					                    </dt>
					                    <dd>
					                    	<img width="380" height="220" alt="公司产品" src="style/images/product_default.png">
				                        	<div class="cp_intro">
				                        						                        		<h3><?= $data['business_product_name']?></h3>
					                            <div class="scroll-pane" style="overflow: hidden; padding: 0px; width: 260px;">
					                            	
					                            <div class="jspContainer" style="width: 260px; height: 140px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 260px;"><div><?= $data['business_product_text']?></div></div></div></div>
					                        </div>
                                        </dd>
					                </dl>
	              				</div>
                    </div>   <!-- end #Product -->
       				<div id="Profile">
                        <div class="profile_wrap">


					            

				            </div>
				                 	
	     			</div><!-- end #Profile -->
      	
      	<!--[if IE 7]> <br /> <![endif]-->
	    
	        	 		        	<!--地理位置-->
						<dl id="noJobs" class="c_section">
		                	<dt>
		                    	<h2><em></em>公司地理位置</h2>
		                    </dt>
		                    <dd>
                               <div id="allmap"></div>


                            </dd>
		                    	<div>
<!--		                        	公司地理位置-->

		                        </div>
		                    </dd>
		                </dl>
	          	

          		<div id="flag"></div>
            </div>	<!-- end .content_l -->
            
            <div class="content_r">
            	<div id="Tags">
	            	<div id="c_tags_show" class="c_tags solveWrap">
	                    <table>
	                        <tbody><tr>
	                            <td width="45">地点</td>
	                            <td><?= $data['business_address']?></td>
	                        </tr>
	                        <tr>
	                            <td>领域</td><!-- 支持多选 -->
	                            <td title="<?= $type[$data['business_style']]?>"><?= $type[$data['business_style']]?></td>
	                        </tr>
	                        <tr>
	                            <td>规模</td>
	                            <td><?= $sort['firm_size'][$data['business_type']]?></td>
	                        </tr>

	                    </tbody></table>

	                </div>

       			</div><!-- end #Tags -->
       			
       			<dl class="c_section c_stages">
                	<dt>
                    	<h2><em></em>发展阶段</h2>

                    </dt>
                    <dd>
                    	<ul class="reset stageshow">
                    		<li>目前阶段：<span class="c5"><?= $sort['stage'][$data['business_stage']]?></span></li>
                    		                    	</ul>

                    </dd>
                </dl><!-- end .c_stages -->


                <dl class="c_section c_stages">
                    <dt>
                    <h2><em></em>创始人</h2>

                    </dt>
                    <dd>
                        <ul class="reset stageshow">
                            <li><span class="c5"><?= $data['business_chairman_name']?></span></li>
                        </ul>
                    </dd>
                </dl><!-- end .c_stages -->

        </div>
   	</div>


<!------------------------------------- end ----------------------------------------->

<script src="style/js/company.min.js" type="text/javascript"></script>
<script>
var avatar = {};
avatar.uploadComplate = function( data ){
	var result = eval('('+ data +')');
	if(result.success){
		jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
		jQuery.colorbox.close();
	}
};
</script>
			<div class="clear"></div>
			<input type="hidden" value="d1035b6caa514d869727cff29a1c2e0c" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: inline;"></a>
	    </div><!-- end #container -->
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.404, 39.915);
    map.centerAndZoom(point, 15);

    var json_data = [[<?= $data['business_coordinate']?>]];
    var pointArray = new Array();
    for(var i=0;i<json_data.length;i++){
        var marker = new BMap.Marker(new BMap.Point(json_data[i][0], json_data[i][1])); // 创建点
        map.addOverlay(marker);    //增加点
        pointArray[i] = new BMap.Point(json_data[i][0], json_data[i][1]);
        marker.addEventListener("click",attribute);
    }
    //让所有点在视野范围内
    map.setViewport(pointArray);
    //获取覆盖物位置
    function attribute(e){
        var p = e.target;
//        alert("marker的位置是" + p.getPosition().lng + "," + p.getPosition().lat);
    }
    map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用j
</script>