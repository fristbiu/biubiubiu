<<<<<<< HEAD
<?php //use backend\models\Profession_type;
//$data=Profession_type::find()->asArray()->all();
$data=array();
=======
<?php use common\models\jobtype;
$data=jobtype::find()->asArray()->all();
>>>>>>> refs/remotes/origin/master
?>
<?php foreach($data as $key=>$val){
    if($val['parent_id']==0){?>
        <div class="menu_box">
            <div class="menu_main">
                <h2><?= $val['jobtype_name']?> <span></span></h2>
            </div>
            <div class="menu_sub dn">
                <?php foreach($data as $k=>$v){
                    if($val['jobtype_id']==$v['parent_id']){ ?>
                <dl class="reset">
                    <dt>
                        <a href="h/jobs/list_后端开发?labelWords=label">
                            <?= $v['jobtype_name']?>
                        </a>
                    </dt>
                    <dd>
                        <?php foreach($data as $kk=>$vv){
                            if($v['jobtype_id']==$vv['parent_id']){ ?>
                        <a href="h/jobs/list_Java?labelWords=label" ><?= $vv['jobtype_name']?></a>
<!--                                class="curr"-->
                  <?php }}?>
                    </dd>
                </dl>
                <?php }}?>
            </div>
        </div>
<?php }}?>
