
        <div class="clearfix">
            <div class="content_l">
            	<dl class="c_delivery">
                    <dt>
                        <h1><em></em>简历</h1>
                        <a class="d_refresh" href="?r=jianli/jianli_add">写简历</a>
                    </dt>
                    <dd>
                            
                    	    <form id="deliveryForm">
                            <ul class="reset my_delivery">
                    <?php foreach($resumeArr as $val){?>
                    <li class="li<?=$val['resume_id']?>">
                             		<div class="d_item">
                    <a target="_blank" href="?r=jianli/jianli_one&resume_id=<?=$val['resume_id']?>">
	                            <em><font color="red"><?=$val['resume_name']?>的简历-》</font></em> 
	                            <span></span>
	                                        	<!--  -->
	                                    	</a>
                                梦想工作：<?=$val['resume_dreamework'];?>
	                                    </h2>
	                        <a title="公司名称" class="d_jobname" target="_blank" href="http://www.lagou.com/c/25927.html">
	                                   	<span></span>
	                                    </a>
	                                    <span class="d_time">2014-07-01 17:15</span>
	                                    <div class="clear"></div>
	                                    <div class="d_resume">
                                            年龄：<?=$val['resume_age']?>&nbsp;&nbsp;&nbsp;&nbsp;
	                                    	工作经验：<?=$val['resume_experience'];?>&nbsp;&nbsp;&nbsp;&nbsp;
                                            学历：<?=$val['resume_process'];?>
	                                    </div>
                <a href="?r=jianli/edit" class="" style="float:right; margin-top:5px;">编辑</a>
                    <a class="btn_showprogress deljianli" data-id="<?=$val['resume_id']?>" href="javascript:;">删除</a>
                                    </div>
                    </li>
                    <?php }?>
                            	                            </ul>

                        </form>
                                            </dd>
                </dl>
            </div>
<!--            右半边-->
            <div class="content_r">



            </div>
       	</div>
      <input type="hidden" id="userid" name="userid" value="314873">
<div class="dn" id="recordPopBox">
	<dl>
		<dt>
			评价面试体验 
			<a class="boxclose" href="javascript:;"></a>
		</dt>
		<dd>
			<form id="recordForm">
				<input type="hidden" value="" id="recordId">
				<ul id="interviewResult" class="record_radio clearfix">
		            <li class="mr35">
		            	已收到offer
		              	<input type="radio" name="type" value="1"> 
		            </li>
		            <li>
		           	     未收到offer
		              	<input type="radio" name="type" value="2"> 
		            </li>
		        </ul>
		        <div class="dividebtm">
		        	<table>
		        		<tbody><tr>
                         	<td width="80" valign="top" align="right">面试评分：</td>
                         	<td>
                         		<ul id="recordStarSelect">
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         		</ul>
                             	<input type="hidden" id="recordStar" value="" name="recordStar">
                             	<div class="clear"></div>
                            </td>
                        </tr>
                     	<tr>
                         	<td valign="top" align="right" class="dividebtman">面试短评：</td>
                         	<td>
                         		
                             	<input type="hidden" class="error" id="select_record_hidden" value="" name="record">
                                <input type="text" autocomplete="off" placeholder="15字以内对面试的简单描述哦" id="select_record" class="selectr_340" maxlength="15">                                      
                                <div class="boxUpDownan boxUpDown_340 dn" id="box_record" style="display: none;">
                                  <ul>
                                    <p>热门短评：</p>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                  </ul>
                            	</div>
                            </td>
                        </tr>
                        <tr>
                         	<td valign="top" align="right" class="dividebtman">面试经历：</td>
                         	<td>
                         		<textarea id="interviewDesc" placeholder="记录下自己的面试经历" style="width: 320px;"></textarea>
                         		<div class="word_count">你还可以输入 <span>500</span> 字</div>
                         		<div id="showName" class="f14 c7">
                         			<label class="checkbox">
		                        		<input type="checkbox">
		                                <i></i>
		                        	</label>
                         			匿名提交
                         		</div>
                         		<input type="hidden" value="" id="isShowName">
                         		<input type="hidden" value="" id="senduid">
                         		<input type="hidden" value="" id="poid">
                         		<input type="hidden" value="" id="deid">
                            </td>
                        </tr>
                        <tr>
                         	<td align="right" colspan="2">
                         		<input type="submit" value="确认提交" class="submitRecord btn_small">
                         	</td>
                        </tr>
                	</tbody></table>
		        </div>
			</form>
		</dd>
	</dl>
</div><!-- end #recordPopBox -->
<script src="style/js/delivery.js"></script>
<script>
$(function(){
	//location.reload(true);

	$('.Pagination').pager({
	      currPage: 1,
	      pageNOName: "pageNo",
	      form: "deliveryForm",
	      pageCount: 1,
	      pageSize:  5
	});
});

$('.deljianli').click(function(){
    //获取ID
    var resume_id=$(this).data('id');
    //发送ajax进行删除
    $.ajax({
        type:'get',
        url:'?r=jianli/del',
        data:{resume_id:resume_id},
        success:function(e){
            if(e==1){
                $('.li'+resume_id).remove();
            }else{
                alert('删除失败！')
            }
        }
    });
});
</script>
			<div class="clear"></div>
			<input type="hidden" value="" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>


