<?php

/**
 * 数组 textarea
 * 值类型如：
 * 0:所有人可见
 * 1:仅注册会员可见
 * 2:仅管理员可见
 * 配置项为空
 * @var $config array
 */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group field-app-name required">
            <label class="control-label col-md-2" for="app-name"><?= $config['title'] ?></label>
            <div class='col-md-4'>
                <textarea id="systemConfig-<?= $config['name'] ?>" class="form-control" rows="6"
                       name="systemConfig[<?= $config['name'] ?>]"><?= $config['value'] ?></textarea>
            </div>
            <div class='col-md-offset-2 col-md-10'></div>
            <div class='col-md-offset-2 col-md-10'>
                <div class="help-block"><?= $config['remark'] ?></div>
            </div>
        </div>
    </div>
</div>