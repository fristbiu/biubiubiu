<table class="public-cont-table col-2" align="center">
	<tr>
		<th style="width:5%">选择</th>
		<th style="width:5%">ID</th>
		<th style="width:20%">公司名称</th>
		<th style="width:5%">LOGO</th>
		<th style="width:5%">审核状态</th>
		<th style="width:5%">公司地址</th>
		<th style="width:10%">公司添加时间</th>						
		<th style="width:15%">操作</th>
	</tr>
	<?php foreach($business as $val){?>
	<tr align="center" height="40">
		<td><input type="checkbox" /></td>
		<td><?=$val['bussiness_id']?></td>						
		<td><?=$val['business_name']?></td>
		<td><span style="color:#999"><img src="../../uploads/business_logo/<?=$val['business_logo']?>" width="48" height="27" alt=""></span></td>
		<td>
			<?php if($val['business_success']==1){?>
				<span style="color:green" data-id="<?=$val['bussiness_id']?>" class="he" title="1">已审核</span>
			<?php }else{?>
				<span style="color:red" class="he" data-id="<?=$val['bussiness_id']?>" title="0">未审核</span>
			<?php }?>
		</td>
		<td><span style="color:#999"><?=$val['business_address']?></span></td>
		<td><span style="color:#999"><?=$val['business_createtime']?></span></td>
		<td align="center">
			<span>
				<a href="">删除</a>
			</span>
		</td>
	</tr>
	<?php }?>
</table>
<style>
	.he{
		cursor: pointer;
	}
</style>
<script src="./js/jquery.min.js"></script>
<script>
	$('.he').click(function(){
		//数据接收
		var state=$(this).attr('title');
		var id=$(this).data('id');
		var s=$(this);
		$.ajax({
			type:'get',
			url:'?r=show/state',
			data:{state:state,id:id},
			success:function(e){
				if(state==1){
					s.attr('title',0);
					s.css('color','red');
					s.text('未审核');
				}else{
					s.attr('title',1);
					s.css('color','green');
					s.text('已审核');
				}
			}
		});
	});
</script>		