<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 15:23
 */


$this->title = '角色分配';
$this->params['breadcrumbs'][] = ['label' => '分配列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="allocation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

