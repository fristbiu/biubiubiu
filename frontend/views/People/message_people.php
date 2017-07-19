<?php
use common\models\jobtype;
//var_dump($sort);die;
?>
<script type="text/javascript" src="style/js/step6.js"></script>
  	<div id="previewWrapper">
        <div class="preview_header">
            <h1 title="jason的简历">个人信息</h1>
                        	<a title="更改信息" class="" href="?r=people/people_one">更改信息</a>
                    </div><!--end .preview_header-->

        <div class="preview_content">
            <div class="profile_box" id="basicInfo">
                <h2>基本介绍</h2>
                <div class="basicShow">
                   <table>
                       <tr>
                           <td>姓名:</td>
                           <td><?= $instory_data['personal_name']?></td>
                           <td>年龄:</td>
                           <td><?= $instory_data['personal_age']?>岁</td>
                           <td>性别:</td>
                       </tr>
                       <tr>
                           <td>学历:</td>
                           <td><?php if(!empty($instory_data['personal_process'])){ echo $sort['process'][$instory_data['personal_process']];}?></td>
                           <td>户籍:</td>
                           <td><?php if(!empty($instory_data['personal_household'])){echo $instory_data['personal_household'];} ?></td>
                           <td></td>
                           <td></td>

                       </tr>

                   </table>
           			<div class="m_portrait">
                    	<div></div>
                        <?php if(empty($instory_data['personal_photo'])){?>
                    	<img width="120" height="120" alt="jason" src="./style/images/default_headpic.png">
                        <?php }else{?>
                            <img width="120" height="120" alt="jason" src="../../uploads/user_head/<?= $instory_data['personal_photo'] ?>">
                        <?php }?>
                    </div>
                </div><!--end .basicShow-->
            </div><!--end #basicInfo-->

				            <div class="profile_box" id="expectJob">
	                <h2>期望工作</h2>
	                <div class="expectShow">
                        希望做：
	                	<?php
                        if(empty($instory_data['personal_dreamwork'])){

                        }else{
                            $dreamwork=jobtype::find()->where('jobtype_id='.$instory_data['personal_dreamwork'])->asArray()->one();
                            echo $dreamwork['jobtype_name'];
                        }
                        ?>
                        希望工资：<?php if(!empty($instory_data['personal_dreammoney'])){ echo $sort['dream_money'][$instory_data['personal_dreammoney']];} ?><br>

	                </div><!--end .expectShow-->
	            </div><!--end #expectJob-->



				            <div class="profile_box" id="projectExperience">
	                <h2>工作经验</h2>
	                <div class="projectShow">
	                  <ul class="plist clearfix">
                          <li class="noborder">
                              <div class="projectList">
                                  <div class="f16 mb10">
                                      <?php if(!empty($instory_data['personal_experience'])){echo  $sort['experience'][$instory_data['personal_experience']];}?>
                                  </div>
	                </div><!--end .projectShow-->
	            </div><!--end #projectExperience-->
                                </div>


            <div class="profile_box" id="projectExperience">
                <h2>家庭地址</h2>
                <div class="projectShow">
                    <ul class="plist clearfix">
                        <li class="noborder">
                            <div class="projectList">
                                <div class="f16 mb10">

                                    地址：<?php echo $instory_data['personal_address']?>
                                </div>
                            </div><!--end .projectShow-->
                </div><!--end #projectExperience-->
            </div>

            <div class="profile_box" id="projectExperience">
                <h2>工作信息</h2>
                <div class="projectShow">
                    <ul class="plist clearfix">
                        <li class="noborder">
                            <div class="projectList">
                                <div class="f16 mb10">
                                    目前状态是：<?php if(!empty($instory_data['personal_jobstate'])){echo $sort['job_start'][$instory_data['personal_jobstate']];} ?>
                                </div>
                            </div><!--end .projectShow-->
                </div><!--end #projectExperience-->
            </div>


            <div class="profile_box" id="selfDescription">
                <h2>自我描述</h2>
                <div class="descriptionShow">
                    <?=$instory_data['personal_introduce']?>
                </div><!--end .descriptionShow-->
            </div><!--end #selfDescription-->

            <div class="profile_box" id="projectExperience">
                <h2>联系方式</h2>
                <div class="projectShow">
                    <ul class="plist clearfix">
                        <li class="noborder">
                            <div class="projectList">
                                <div class="f16 mb10">
                                    QQ：<?= $instory_data['personal_qq']?><br>
                                    电话：<?= $instory_data['personal_tel']?><br>
                                    固定电话：<?= $instory_data['personal_phone']?><br>



                                </div>
                            </div><!--end .projectShow-->
                </div><!--end #projectExperience-->
            </div>

			        </div><!--end .preview_content-->
  	</div><!--end #previewWrapper-->







