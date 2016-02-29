<?php
/**
 * Created by PhpStorm.
 * User: A104
 * Date: 2015/12/23
 * Time: 18:08
 */


$this->title = '添加角色';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-category-create">

    <?= $this->render('_form', [
        'model' => $model,
        'menus' => $menus
    ]) ?>

</div>