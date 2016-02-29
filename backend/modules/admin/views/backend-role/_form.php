<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 18:09
 */
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use \common\models\system\App;

?>
<!--    --><?php
//    echo Form::widget([
//        'model'      => $model,
//        'form'       => $form,
//        'columns'    => 1,
//        'attributes' => [
//            'name'  => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => '输入行业名称...', 'maxlength' => true]],
//            'data'  => ['type' => Form::INPUT_CHECKBOX_LIST, 'options' => ['placeholder' => '如：1', 'maxlength' => true],'itemOptions'=>ArrayHelper::map(AppMenu::findAll(['status' => 1]),'id','name')],
//        ],
//    ]);
//    ?>

<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/js/jstree.min.js"></script>
<link type="text/css" rel="stylesheet" href="/css/jstree/style.min.css">

<div class="backend-role-form">
    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>


    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_base" data-toggle="tab">基本信息</a></li>
                    <?php foreach ($menus as $code=>$menue):?>
                        <?php if(!empty($menue)): ?>
                            <li ><a href="#tab_<?php echo $code ?>" data-toggle="tab"><?= App::find()->where(['code'=>$code])->one()->name;?></a></li>
                        <?php  endif; ?>
                    <?php endforeach;?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_base">

                        <?= $form->field($model, 'name') ?>

                        <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用']) ?>
                    </div><!-- /.tab-pane -->

                    <?php foreach ($menus as $code=>$menue):?>
                        <?php if(!empty($menue)): ?>
                            <div class="tab-pane" id="tab_<?php echo $code ?>">

                            </div><!-- /.tab-pane -->
                        <?php  endif; ?>
                    <?php endforeach;?>

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div>
    <!--效果html结束-->

    <div id="checkboxGroup"></div>

<div class="form-group">
    <?= Html::submitButton('保存') ?>
</div>


    <script>
        var checkObj = {};
        var  arr=<?php echo json_encode($model->data_select); ?> ;

        <?php foreach ($menus as $code=>$menue):?>
        <?php if(!empty($menue)): ?>

        $('#tab_<?php echo $code ?>').jstree({
            "core" : {
                "animation" : 0,
                "check_callback" : true,
                "multiple":true,
                "themes" : { "stripes" : true },
                'data' : <?php  echo json_encode($data[$code])  ?>

            },
            "checkbox" : {
                "keep_selected_style" : true
            },
            "plugins" : [
                "types", "wholerow", "checkbox"
            ]
         }).on('loaded.jstree',function(e,data){
            $('#tab_<?php echo $code ?>').find("li").each(function() {
                var _self = $(this);
                for(var x in arr) {
                    if (_self.attr("id") == arr[x]) {
                        data.instance.check_node(_self);
                    }
                }

            });

        });

        $('#tab_<?php echo $code ?>').on("changed.jstree", function (e, data) {
            console.log(data.selected);
            checkObj['tab_<?php echo $code ?>'] = data.selected;
            var thtml = '';
            for(key in checkObj){
                var tname = key.replace('tab_','');
                thtml+= '<input type="hidden" name="BackendRole[data]['+tname+']" value="'+checkObj[key]+'">';
            }
            $('#checkboxGroup').html(thtml);
        });
        <?php  endif; ?>
        <?php endforeach;?>

    </script>


<?php ActiveForm::end(); ?>

</div>