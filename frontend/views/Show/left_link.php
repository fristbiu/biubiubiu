<?php //use backend\models\Profession_type;
//$data=Profession_type::find()->asArray()->all();
$data=array();
?>
<?php foreach($data as $key=>$val){
    if($val['parent_id']==0){?>
        <div class="menu_box">
            <div class="menu_main">
                <h2><?= $val['pro_name']?> <span></span></h2>
            </div>
            <div class="menu_sub dn">
                <?php foreach($data as $k=>$v){
                    if($val['id']==$v['parent_id']){ ?>
                <dl class="reset">
                    <dt>
                        <a href="h/jobs/list_后端开发?labelWords=label">
                            <?= $v['pro_name']?>
                        </a>
                    </dt>
                    <dd>
                        <?php foreach($data as $kk=>$vv){
                            if($v['id']==$vv['parent_id']){ ?>
                        <a href="h/jobs/list_Java?labelWords=label" ><?= $vv['pro_name']?></a>
<!--                                class="curr"-->
                  <?php }}?>
                    </dd>
                </dl>
                <?php }}?>
            </div>
        </div>
<?php }}?>
