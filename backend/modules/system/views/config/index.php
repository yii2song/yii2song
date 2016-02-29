<?php

use yii\helpers\Url;
use backend\modules\system\assets\SystemConfigAsset;

/**
 * @var $this yii\web\View
 * @var $groups array
 * @var $currentGroup integer
 * @var $configs array
 */
$this->title = '配置中心';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $groups[$currentGroup] . '配置';

SystemConfigAsset::register($this);
?>
<div class="system-config-index">
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <?php
            foreach ($groups as $groupKey => $group) {
                $groupActiveClass = (($groupKey == $currentGroup) ? 'active' : '');
                ?>
                <li class="<?= $groupActiveClass ?>">
                    <a href="<?= Url::to(['index', 'currentGroup' => $groupKey]) ?>"><?= $group ?>配置</a>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="panel-body">
                    <div class="system-config-form">
                        <form id="J_formSystemConfig" class="form-horizontal kv-form-horizontal"
                              action="<?= Url::to(['save', 'currentGroup' => $currentGroup]) ?>" method="post">
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                                   value="<?= Yii::$app->request->csrfToken ?>">

                            <?php foreach ($configs as $configKey => $config) {
                                echo $this->render('_configElement' . $config['type'], ['config' => $config]);
                            } ?>

                            <div class="row">
                                <div class="col-md-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">提交保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
