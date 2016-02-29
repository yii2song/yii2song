<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 18:48
 */


$this->title = '更新角色';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-role-update">

    <?= $this->render('_form', [
        'model' => $model,
        'menus' => $menus,
        'data'  =>$data,
    ]) ?>

</div>