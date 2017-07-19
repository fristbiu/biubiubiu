
                	<?php echo $this->render('create_left');?>
            <div class="content">
            	<dl class="company_center_content">
                    <dt>
                        <h1>
                            <em></em>
                           有效职位 <span>（共<i style="color:#fff;font-style:normal" id="positionNumber"><?=$count?></i>个）</span>                        </h1>
                    </dt>
                    <dd>
                    		                    	<form id="searchForm">
	                    		<input type="hidden" value="Publish" name="type">
	                    		<?php foreach($arr as $k => $v) {?>
			                	<ul class="reset my_jobs">
				                			                            	<li data-id="149594">
		                                    <h3>
		                                        <a target="_blank" title="<?=$v['advertise_name']?>" href=""><?=$v['advertise_name']?></a> 
		                                       
		                                        						                        		                                    </h3>
		                                    		                                  		<span class="receivedResumeNo"><a href="unHandleResumes.html?positionId=149594">应聘简历（1）</a></span>
		                                  			                                    <div><?=$v['advertise_name']?>  / <?=$v['advertise_experience']?> / <?=$v['advertise_process']?></div>
		                                    		                                    				                                    <div class="c9">活动时间：<?=$v['advertise_star']?>-<?=$v['advertise_end']?></div>
			                                    		                                    		                                    		                                    <div class="links">
		                                    			                                       	<a class="job_refresh" href="javascript:void(0)">刷新<span>每个职位7天内只能刷新一次</span></a>
		                                       			                                       	<a target="_blank" class="job_edit" href="create.html?positionId=149594">编辑</a>
		                                       	<a class="offline" data-id="<?=$v['advertise_id']?>" href="javascript:void(0)">下线</a>                      
		                                        <a class="job_del" data-id="<?=$v['advertise_id']?>" href="javascript:void(0)">删除</a>
		                                    </div>
		                                    		                                </li>
	                                	                           	</ul>
	                                	                           	<?php }?>
			                    			                </form>
		                                    </dd>
                </dl>
            </div><!-- end .content -->
<script src="style/js/job_list.min.js" type="text/javascript"></script> 
			<div class="clear"></div>
			<input type="hidden" value="74fb1ce14ebf4e2495270b0fbad64704" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
<script src="./jquery.js"></script>
<script>
	$(".offline").click(function(){
		var id=$(this).data('id');
		$.ajax({
			type:'get',
			url:"?r=advertise/offline",
			data:{id:id},
			success:function(e){
				if(e==1)
				{
					window.location.reload();
				}
				else
				{
					alert('下线失败');
				}
			}
		});
	});
	$(".job_del").click(function(){
		var id=$(this).data('id');
		$.ajax({
			type:'get',
			url:"?r=advertise/job_del",
			data:{id:id},
			success:function(e){
				if(e==1)
				{
					window.location.reload();
				}
				else
				{
					alert('删除失败');
				}
			}
		});
	});
</script>
