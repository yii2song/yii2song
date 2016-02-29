<?php
/**
 * Created by PhpStorm.
 * User: AndySong
 * Date: 2015-11-18
 * Time: 15:46
 */
use kartik\tabs\TabsX;

$this->title = '图标选择器';
?>
<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        background: #fff;
    }
    #J_iconsBox .nav-tabs {
        position: fixed;
        width: 200px;
        height: 100%;
    }
    #J_iconsBox .tab-content {
        margin-left: 220px;
        border-left: 0;
    }
    .icon-box {
        display: block;
        float: left;
        width: 300px;
        cursor: pointer;
        line-height: 24px!important;
        color: #333;
        text-decoration: none;
    }
    .icon-box i {
        font-size: 16px!important;
        line-height: 20px!important;
        margin-right: 10px;
    }
    .icon-box:hover {
        color: #fff;
        background: #337ab7;
        -webkit-border-radius: 5px!important;
        -moz-border-radius: 5px!important;
        border-radius: 5px!important;
        text-decoration: none;
    }
    .icon-box:hover i {
        color: #fff;
        font-size: 20px!important;
        margin-right: 16px;
    }
</style>

<div class="icons-box" id="J_iconsBox">
    <?php
    $items = [];
    foreach($iconGroup as $key1 => $group) {
        $content = '';
        foreach($group->icons as $key2 => $icon) {
            $content .= "<a class=\"icon-box fa-item\" data-class=\"{$icon['class']}\"><i class=\"{$icon['class']}\"></i>" .
                ($key2+1) .
                ". {$icon['name']}</a>";
        }

        $items[] = [
            'label' => $key1 + 1 . '. ' .$group['name'],
            'content' => $content,
            'active' => false,
        ];
    }

    echo TabsX::widget([
        'items'        => $items,
        'position'     => TabsX::POS_LEFT,
        'encodeLabels' => false,
    ]);

    $view = Yii::$app->getView();

    $js = <<< ICON
$('#J_iconsBox').on('click', '.icon-box', function(e) {
    if (top.window.{$callback}) {
        top.window.{$callback}($(this).data('class'));
    }
});
ICON;
    $view->registerJs($js);
    ?>

</div>