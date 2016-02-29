<?php
/**
 * Created by PhpStorm.
 * User: AndySong
 * Date: 2015-11-30
 * Time: 13:17
 */

/**
 * @var $node \backend\modules\system\models\AppMenu
 * @var $app \common\models\system\App;
 */
echo $form->field($node, 'description')->textarea([
    'placeholder' => '输入菜单描述...',
]);
echo $form->field($node, 'module')->textInput([
    'placeholder' => '如：product',
]);
echo $form->field($node, 'controller')->textInput([
    'placeholder' => '如：category',
]);
echo $form->field($node, 'action')->textInput([
    'placeholder' => '如：create',
]);
echo $form->field($node, 'path')->textInput([
    'placeholder' => '如：product/category/create',
]);
echo $form->field($node, 'url')->textInput([
    'placeholder' => '如：@app_url/product/category/create',
]);
echo $form->field($node, 'order')->textInput([
    'placeholder' => '数字，越小越靠前',
]);
